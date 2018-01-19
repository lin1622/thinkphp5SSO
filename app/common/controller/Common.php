<?php

namespace app\common\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    //登录状态
    protected $isLogin;

    public function __construct()
    {
        parent::__construct();
        if(!$this->isAllow()){
            echo '无权访问';
            return;
        }
        $this->isLogin();
    }

    //判断请求的来源是否合法(添加多种验证方式)
    private function isAllow()
    {
        if(in_array($_SERVER['REMOTE_ADDR'], config('allow_ip'))){
            return true;
        }
    }

    //判断并设置登录状态
    private function isLogin()
    {
        $this->isLogin = false;
    }
}
