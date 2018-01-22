<?php

namespace app\common\controller;

use think\Controller;
use think\Request;
use think\Cache;

class Common extends Controller
{
    protected $uid ;

    protected $noCheckMoudle = [];

    protected $noCheckController = [];

    protected $noCheckAction = [];

    protected function checkAccess()
    {
        if($this->noCheckMoudle){
            if(in_array(strtolower($this->request->module()),$this->noCheckMoudle)){
                return ;
            }
        }
        if($this->noCheckController){
            if(in_array(strtolower($this->request->controller()),$this->noCheckController)){
                return ;
            }
        }
        if($this->noCheckAction){
            if(in_array(strtolower($this->request->action()),$this->noCheckAction)){
                return ;
            }
        }

        $userToken = cookie('xmus');
        if($userToken){
            $redisObj = Cache::store('redis')->handler();
            $uid = $redisObj->get($userToken);
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
        $this->checkAccess();
    }

    public function __construct()
    {
        parent::__construct();

    }
}
