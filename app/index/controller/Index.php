<?php
namespace app\index\controller;

use think\Cache;
use \think\Controller;

class Index extends Common
{
    public function index()
    {
        $uid = $this->uid;
        $redisObj = Cache::store('redis')->handler();
        $userInfo = $redisObj->hgetall('user_'.$uid);
        $userInfo['uid'] = $uid;
        $this->assign('user',$userInfo);
       return $this->fetch();
    }

}
