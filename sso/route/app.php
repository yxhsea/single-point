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
use think\facade\Route;

Route::get('auth/show', 'auth/show');
Route::get('index/index', 'index/index')->middleware(\app\middleware\AuthVerify::class);

Route::get('api/list', 'api/list')->middleware(\app\middleware\ApiVerify::class);
Route::get('api/info', 'api/info')->middleware(\app\middleware\ApiVerify::class);
Route::post('api/save', 'api/save')->middleware(\app\middleware\ApiVerify::class);
