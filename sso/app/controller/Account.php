<?php
namespace app\controller;

use app\BaseController;
use think\facade\Cookie;
use think\facade\View;

class Account extends BaseController
{
    public function index()
    {
        // 写入 Cookie
        Cookie::set('token', md5(time()), ['expire' => 3600, 'domain' => 'erp.com']);

        $redirectUrl = input('redirect_url');
        if (!empty($redirectUrl)) {
            return redirect($redirectUrl);
        }


        return View::fetch('account/index');
    }
}
