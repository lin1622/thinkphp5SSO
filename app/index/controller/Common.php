<?php

namespace app\index\controller;

use think\Cache;
use think\Controller;
use think\Request;

class Common extends Controller
{
    protected $uid ;

    private function checkUser()
    {
        $userToken = cookie('xmus');
        if($userToken){
            $uid = Cache::get($userToken);
            if($uid){
                $this->uid = $uid;
                return;
            }else{
                $this->redirect('/login');
            }
        }else{
            $this->redirect('/login');
        }
    }
    protected function _initialize()
    {
        $this->checkUser();
    }

    public function __construct()
    {
        parent::__construct();

    }



    public function test()
    {

        $users  = [
            'user_1'=>['name'=>'lm','fullname'=>'linmao','email' => 'linmao@example.com','password' => '123456' ],
            'user_2'=>['name'=>'test','fullname'=>'testfuillname','email' => 'test@example.com','password' => '123456' ],
            ];
        $redisObj = Cache::store('redis')->handler();
//        $redisObj->hMset('user_1',$users['user_1']);
//        $redisObj->hMset('user_2',$users['user_2']);
        $userinfo = $redisObj->hgetall('user_1');
        dump($userinfo);die();

    }

}
