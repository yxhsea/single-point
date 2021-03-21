<?php
namespace app\controller;

use app\BaseController;
use app\model\SsoInfo;
use think\facade\Db;
use think\facade\View;

class Index extends BaseController
{
    public function index()
    {
        return View::fetch('index/index');
    }

    public function add()
    {
        return View::fetch('index/add');
    }

    public function edit()
    {
        return View::fetch('index/edit');
    }

    public function detail()
    {
        return View::fetch('index/detail');
    }

    public function welcome()
    {
        return View::fetch('index/welcome');
    }
}
