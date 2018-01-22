<?php
namespace app\index\controller;

use think\Cache;
use \app\common\controller\Common;
use think\Session;

class Index extends Common
{
    public function index()
    {
        $uid = $this->uid;
        $redisObj = Cache::store('redis')->handler();
        $userInfo = $redisObj->hgetall('user_'.$uid);
        $xmjyssid = cookie('xmjyssid');
//        session_start();
        $res = $redisObj->get($xmjyssid);
//        $res1 = unserialize($res);
        
        print_r($res);die();

        $userInfo['uid'] = $uid;
        $this->assign('user',$userInfo);
       return $this->fetch();
    }

}
