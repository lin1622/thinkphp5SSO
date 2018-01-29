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
Route::rule('/login','auth/Authenticate/login');
Route::rule('/logout','auth/Authenticate/logout');
Route::rule('/dologin','auth/Authenticate/checklogin' ,'POST');
Route::rule('/commonhtml','auth/Authenticate/commonhtml');
Route::rule('/index','index/index/index');
Route::rule('/seed','auth/Authenticate/seed');
Route::rule('/socketdemo','auth/Authenticate/socketdemo');

/*--------API------*/
//用户模块  指令定义
Route::rule('/api/users','api/Users/command');


