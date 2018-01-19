<?php

namespace app\auth\controller;

use think\Controller;
use think\Request;

class Authenticate extends Controller
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

    public $key ;

    public $metabaseSiteUrl = 'http://loccalhost';
    public $metabaseSecretKey = 'qwerty';

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return $this->fetch();
    }


    public function checklogin( $username, $password)
    {
        $res = ['status'=>'success','message'=>''];

        if(isset($this->userInfo[$username]) && $this->userInfo[$username]['password'] == $password){


            return json(['result' => 'success', 'message' => 'Token generated successfully', 'token' => '' . $token,]);
        }else{
            $res['status'] = 'error';
            $res['message'] = '账号密码错误';
            return json($res);
        }
    }

    public function validateToken($token)
    {
        try {
            $token = (new Parser())->parse($token);
        } catch (Exception $exception) {
            return false;
        }

        $validationData = new ValidationData();
        $validationData->setIssuer('JWT Example');
        $validationData->setAudience('JWT Example');

        return $token->validate($validationData);
    }


}
