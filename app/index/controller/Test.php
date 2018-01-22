<?php

namespace app\index\controller;

use app\common\controller\Common;
use app\common\model\Users;
use think\Request;

class Test extends Common
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $request->get('uuid');
        if(!$this->isLogin){
            echo '未登录状态，回到登录页面';
            return;
        }
    }

    //登录
    public function login(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');
        $user = Users::get([
            'username'=>$username,
            'password'=>$password
        ]);
        if(empty($user)){
            return '用户名或密码错误';
        }else{
            //这里操作redis保存登录状态
        }
    }

    //测试前段抓取指纹
    public function test()
    {
        return $this->fetch();
    }
}
