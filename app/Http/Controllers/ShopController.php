<?php

namespace App\Http\Controllers;

use App\Http\Models\Goods;
use App\Http\Models\GoodsLabel;
use App\Http\Models\Label;
use App\Http\Models\Order;
use App\Http\Models\OrderLabel;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Mockery\Exception;
use Response;
use Redirect;
use DB;

/**
 * 商店控制器
 * Class LoginController
 *
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{
    // 商品列表
    public function goodsList(Request $request)
    {
        $goodsList = Goods::query()->where('is_del', 0)
            ->orderBy('status','asc')
            ->orderBy('type','asc')
            ->orderBy('price','asc')
            ->paginate(15);
        foreach ($goodsList as $goods) {
            $goods->traffic = flowAutoShow($goods->traffic * 1048576);
        }

        $view['goodsList'] = $goodsList;

        return $this->view('shop/goodsList', $view);
    }

    // 添加商品
    public function addGoods(Request $request)
    {
        if ($request->method() == 'POST') {
            $name = $request->get('name');
            $desc = $request->get('desc', '');
            $traffic = $request->get('traffic');
            $price = $request->get('price', 0);
            $score = $request->get('score', 0);
            $type = $request->get('type', 1);
            $days = $request->get('days', 90);
            $order = $request->get('order', 0);
            $number = $request->get('number', -1);
            $labels = $request->get('labels');
            $available_start = $request->get('available_start', -1);
            $available_end = $request->get('available_end', -1);
            $status = $request->get('status');


            $available_start = $available_start == -1 ? $available_start : strtotime(date('Y-m-d h:i:00', strtotime($available_start)));
            $available_end = $available_end == -1 ? $available_end : strtotime(date('Y-m-d h:i:00', strtotime($available_end)));


            if (empty($name) || empty($traffic)) {
                $request->session()->flash('errorMsg', '请填写完整');

                return Redirect::back()->withInput();
            }

            // 套餐必须有价格
            if ($type == 2 && $price <= 0) {
                $request->session()->flash('errorMsg', '套餐价格必须大于0');

                return Redirect::back()->withInput();
            }

            // 套餐有效天数必须大于90天
            if ($type == 2 && $days < 90) {
                $request->session()->flash('errorMsg', '套餐有效天数必须不能少于90天');

                return Redirect::back()->withInput();
            }

            // 优先级必须大于等于0
            if ($order < 0) {
                $request->session()->flash('errorMsg', '优先级必须大于等于0');

                return Redirect::back()->withInput();
            }

            // 流量不能超过1PB
            if ($traffic > 1073741824) {
                $request->session()->flash('errorMsg', '内含流量不能超过1PB');

                return Redirect::back()->withInput();
            }

            // 商品LOGO
            $logo = '';
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileType = $file->getClientOriginalExtension();
                $logoName = date('YmdHis') . mt_rand(1000, 2000) . '.' . $fileType;
                $move = $file->move(base_path() . '/public/upload/image/goods/', $logoName);
                $logo = $move ? '/upload/image/goods/' . $logoName : '';
            }

            DB::beginTransaction();
            try {
                $goods = new Goods();
                $goods->name = $name;
                $goods->desc = $desc;
                $goods->logo = $logo;
                $goods->traffic = $traffic;
                $goods->price = $price;
                $goods->score = $score;
                $goods->type = $type;
                $goods->days = $days;
                $goods->order = $order;
                $goods->number = $number;
                $goods->is_del = 0;
                $goods->available_start = $available_start;
                $goods->available_end = $available_end;
                $goods->status = $status;
                $goods->save();

                // 生成SKU
                $goods->sku = 'S0000' . $goods->id;
                $goods->save();

                // 生成商品标签
                if (!empty($labels)) {
                    foreach ($labels as $label) {
                        $goodsLabel = new GoodsLabel();
                        $goodsLabel->goods_id = $goods->id;
                        $goodsLabel->label_id = $label;
                        $goodsLabel->save();
                    }
                }

                $request->session()->flash('successMsg', '添加成功');

                DB::commit();
            } catch (\Exception $e) {
                $request->session()->flash('errorMsg', '添加失败');

                DB::rollBack();
            }

            return Redirect::to('shop/goodsList');
        } else {
            $view['label_list'] = Label::query()->orderBy('sort', 'desc')->orderBy('id', 'asc')->get();

            return $this->view('shop/addGoods', $view);
        }
    }

    // 编辑商品
    public function editGoods(Request $request)
    {
        $id = $request->get('id');

        if ($request->method() == 'POST') {
            $name = $request->get('name');
            $number = $request->get('number', -1);
            $desc = $request->get('desc');
            $price = $request->get('price', 0);
            $labels = $request->get('labels');
            $order = $request->get('order');
            $available_start = $request->get('available_start', -1);
            $available_end = $request->get('available_end', -1);
            $status = $request->get('status');


            $available_start = $available_start == -1 ? $available_start : strtotime(date('Y-m-d h:i:00', strtotime($available_start)));
            $available_end = $available_end == -1 ? $available_end : strtotime(date('Y-m-d h:i:00', strtotime($available_end)));


            $goods = Goods::query()->where('id', $id)->first();
            if (!$goods) {
                $request->session()->flash('errorMsg', '商品不存在');

                return Redirect::back();
            }

            if (empty($name)) {
                $request->session()->flash('errorMsg', '请填写完整');

                return Redirect::back()->withInput();
            }

            // 优先级必须大于等于0
            if ($order < 0) {
                $request->session()->flash('errorMsg', '优先级必须大于等于0');

                return Redirect::back()->withInput();
            }

            // 套餐必须有价格
            if ($goods->type == 2 && $price <= 0) {
                $request->session()->flash('errorMsg', '套餐价格必须大于0');

                return Redirect::back()->withInput();
            }

            // 商品LOGO
            $logo = '';
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileType = $file->getClientOriginalExtension();
                $logoName = date('YmdHis') . mt_rand(1000, 2000) . '.' . $fileType;
                $move = $file->move(base_path() . '/public/upload/image/goods/', $logoName);
                $logo = $move ? '/upload/image/goods/' . $logoName : '';
            }

            DB::beginTransaction();
            try {
                $data = [
                    'name' => $name,
                    'number' => $number,
                    'desc' => $desc,
                    'logo' => $logo,
                    'price' => $price * 100,
                    'status' => $status,
                    'available_start' => $available_start,
                    'available_end' => $available_end,
                    'order' => $order
                ];

                Goods::query()->where('id', $id)->update($data);

                // 先删除该商品所有的标签
                GoodsLabel::query()->where('goods_id', $id)->delete();

                // 生成商品标签
                if (!empty($labels)) {
                    foreach ($labels as $label) {
                        $goodsLabel = new GoodsLabel();
                        $goodsLabel->goods_id = $id;
                        $goodsLabel->label_id = $label;
                        $goodsLabel->save();
                    }
                }

                $request->session()->flash('successMsg', '编辑成功');

                DB::commit();
            } catch (\Exception $e) {
                $request->session()->flash('errorMsg', '编辑失败');

                DB::rollBack();
            }

            return Redirect::to('shop/goodsList');
        } else {
            $goods = Goods::query()->with(['label'])->where('id', $id)->first();
            if ($goods) {
                $label = [];
                foreach ($goods->label as $vo) {
                    $label[] = $vo->label_id;
                }
                $goods->labels = $label;
            }

            $view['goods'] = $goods;
            $view['is_date'] = ($goods->available_start == -1 && $goods->available_end == -1) ? 0 : 1;
            $view['label_list'] = Label::query()->orderBy('sort', 'desc')->orderBy('id', 'asc')->get();

            return $this->view('shop/editGoods', $view);
        }
    }

    // 删除商品
    public function delGoods(Request $request)
    {
        $id = $request->get('id');

        Goods::query()->where('id', $id)->update(['is_del' => 1]);

        return $this->json(['status' => 'success', 'data' => '', 'message' => '删除成功']);
    }

    //商品赠送功能
    public function presentGoods(Request $request)
    {

        if ($request->method() == 'POST') {

            DB::beginTransaction();
            try {

                $user_ids = $request->get('user_ids');
                $goods_ids = $request->get('goods_ids');
                $status = $request->get('status');

                $user_ids = explode(';', $user_ids);
                $goods_ids = explode(';', $goods_ids);

                foreach ($user_ids as $user_id) {
                    foreach ($goods_ids as $goods_id) {

                        $result = User::addOrder($user_id, $goods_id, $coupon_sn = -1, $status = $status, $pay_way = 0);
                        if($result['status'] == 'fail'){
                            throw  new Exception($result['message']);
                        }
                    }
                }
                $request->session()->flash('successMsg', '操作成功');
                DB::commit();
                return Redirect::back();

            } catch (\Exception $e) {
                DB::rollBack();
                $request->session()->flash('errorMsg', '操作失败：' . $e->getMessage());
                return Redirect::back()->withInput();
            }


        } else {

            return $this->view('shop/presentGoods');
        }
    }

    public function refreshLabel(Request $request){
        if ($request->method() == 'POST') {
            try {
                DB::beginTransaction();
                $refresh = $request->get('refresh');
                if($refresh == '0'){

                    $request->session()->flash('errorMsg', '操作无效');
                    DB::commit();
                    return Redirect::back();
                }
                $orders = Order::query()->where(['status' => '2', 'is_expire' => 0])->get(['oid','goods_id'])->toArray();
                foreach ($orders as $order){
                    // 删除原有的标签
                    OrderLabel::query()->where('oid',$order['oid'])->delete();
                    // 修改为******写订单标签****
                    $goodsLabels = GoodsLabel::query()->where('goods_id', $order['goods_id'])->pluck('label_id')->toArray();
                    foreach ($goodsLabels as $vo) {
                        $obj = new OrderLabel();
                        $obj->oid = $order['oid'];
                        $obj->label_id = $vo;
                        $obj->save();
                    }
                }

                $request->session()->flash('successMsg', '操作成功');
                DB::commit();
                return Redirect::back();

            } catch (\Exception $e) {
                DB::rollBack();
                $request->session()->flash('errorMsg', '操作失败' . $e->getMessage());
                return Redirect::back()->withInput();
            }

        } else {

            return $this->view('shop/refreshLabel');
        }
    }


}
