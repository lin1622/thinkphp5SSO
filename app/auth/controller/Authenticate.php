<?php

namespace app\auth\controller;

use think\Cache;
use think\Request;
use app\common\controller\Common;
use think\Session;


class Authenticate extends Common
{

    public $userInfo = [
        'linmao' => [
            'uid' => '1',
            'fullname' => 'linmao',
            'email' => 'linmao@example.com',
            'password' => '123456' //
        ],
        'test' => [
            'uid' => '2',
            'fullname' => 'test',
            'email' => 'test@example.com',
            'password' => '123456' //
        ],
    ];

//    protected $noCheckMoudle = ['auth'];

    protected $noCheckController = ['authenticate'];


    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function login()
    {
        $userToken = cookie('xmus');
        if($userToken){
            $redisObj = Cache::store('redis')->handler();
            $uid = $redisObj->get($userToken);
//            $uid = Cache::get($userToken);
            if($uid){
                $this->uid = $uid;
                $this->redirect('/index');
            }
        }
        return $this->fetch();
    }


    public function checklogin( $username, $password)
    {
        $res = ['status'=>'success','message'=>''];
        if(isset($this->userInfo[$username]) && $this->userInfo[$username]['password'] == $password){

            $token = hash('sha256',$this->userInfo[$username]['uid'] .time());
            $redisObj = Cache::store('redis')->handler();
            Session::set('user',$this->userInfo[$username]);
            $redisObj->set($token,$this->userInfo[$username]['uid']);
            setcookie('xmus',$token);
            $res['message'] = 'Token generated successfully';
            $res['token'] = $token;
            return json($res);
        }else{
            $res['status'] = 'error';
            $res['message'] = '账号密码错误';
            return json($res);
        }
    }


    public function logout()
    {
        $token = cookie('xmus');
        $redisObj = Cache::store('redis')->handler();
        $redisObj->del($token);
        cookie('xmus',null);
        $this->redirect('/login');
    }

    public function commonhtml()
    {
        return $this->fetch();
    }

    public function seed()
    {
        $users  = [
            'user_1'=>['name'=>'lm','fullname'=>'linmao','email' => 'linmao@example.com','password' => '123456' ],
            'user_2'=>['name'=>'test','fullname'=>'testfuillname','email' => 'test@example.com','password' => '123456' ],
        ];
        $redisObj = Cache::store('redis')->handler();
        $redisObj->hMset('user_1',$users['user_1']);
        $redisObj->hMset('user_2',$users['user_2']);
//        $userinfo = $redisObj->hgetall('user_1');
//        dump($userinfo);die();
    }
}
