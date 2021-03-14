<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;

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
}
