
## 配置
````
0. 复制并修改里面的各种参数
cp .env.example .env

1.创建一个utf8mb4的数据库

2.编辑config/database.php，编辑mysql选项中如下配置值：host、port、database、username、password

3.手动将sql/db.sql导入到创建好的数据库

````

````
迁移未经完整测试，存在BUG，可以
````

## 加入NGINX的URL重写规则
````
location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
````

## 定时任务
````
crontab加入如下命令（请自行修改php、ssrpanel路径）：
* * * * * php /home/wwwroot/SSRPanel/artisan schedule:run >> /dev/null 2>&1

注意运行权限，必须跟ssrpanel项目权限一致，否则出现无权限报错：
crontab -e -u www
````

## 日志分析（仅支持单机单节点）
````
找到SSR服务端所在的ssserver.log文件
进入ssrpanel所在目录，建立一个软连接，并授权
cd /home/wwwroot/ssrpanel/storage/app
ln -S ssserver.log /root/shadowsocksr/ssserver.log
chown www:www ssserver.log
````

## SSR(R)部署
````
git clone https://github.com/ssrpanel/shadowsocksr.git
cd shadowsocksr
sh initcfg.sh
配置 usermysql.json 里的数据库链接，NODE_ID就是节点ID，对应面板后台里添加的节点的自增ID，所以请先把面板搭好，搭好后进后台添加节点
````

## 更新代码
````
进到ssrpanel目录下执行：
git pull

执行一遍 
php composer.phar install
````