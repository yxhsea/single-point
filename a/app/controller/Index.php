<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;
use SSOServer;

class Index extends BaseController
{
    public function index()
    {
        return View::fetch('index/index');
    }

    public function welcome()
    {
        return View::fetch('index/welcome');
    }

    public function logout()
    {
        SSOServer::deleteAccessToken();
        return json(['code' => 0, 'msg' => 'success']);
    }
}
