<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 验证
 * Class Verify
 *
 * @package App\Http\Models
 */
class Verify extends Model
{
    protected $table = 'verify';
    protected $primaryKey = 'id';

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public  static function filter_email($username){
        $result = ['status'=>'success','msg'=>'ok'];

        $v1 = filter_var($username, FILTER_VALIDATE_EMAIL);
        if($v1 == false){
            $result['status'] = 'fail';
            $result['msg'] = '用户名必须是合法邮箱，请重新输入';
            return $result;
        }
        $black_list = ['outlook','hotmail'];
        foreach ($black_list as $mail){
            if(strpos($username,$mail)){
                $result['status'] = 'fail';
                $result['msg'] = '用户名必须是合法邮箱，且不能是'.$mail.'邮箱';
                return $result;
            }
        }
        return $result;
    }

}