<?php

namespace app\api\controller;

use think\Controller;
use think\Request;


class Users extends Controller
{
    use \traits\controller\Jump;

    /**
     * api users统一指令入口
     * @param Request $request
     */
    public function command(Request $request)
    {
        $command = $request->param('command');

        switch($command){
            case 'checklogin':
                return $this->checklogin($request);
                break;
            default:
                break;
        }
    }

    /**
     * 验证登录用户信息
     * @param Request $request
     */
    public function checklogin(Request $request)
    {
        $account = $request->param('account');
        $password = $request->param('password');
        $user = \think\Loader::model('Users') ;
        $userInfo = $user->where(['account'=>$account,'password'=>$password])->find();
        if($userInfo){
            return $this->result($userInfo->toArray(),10001,'userinfo','json');
        }else{
            return $this->result([],40001,'userinfo','json');
        }
    }
}
