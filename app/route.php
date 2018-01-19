<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use \think\Route;
Route::rule('/login','auth/Authenticate/index');
Route::rule('/dologin','auth/Authenticate/checklogin' ,'POST');
Route::rule('/test','auth/Authenticate/test');
Route::rule('/index','index/Index/index');

