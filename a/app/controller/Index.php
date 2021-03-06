<?php
namespace app\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return "登录 A 系统成功";
    }

    public function user()
    {
        return "用户列表";
    }
}
