<?php
namespace app\controller;

use app\BaseController;

class Index extends BaseController
{
    const SSO_LOGIN_URL = 'http://sso.erp.com/login';
    const REDIRECT_URL = 'http://b.erp.com';

    public function index()
    {
        return "登录 B 系统成功";
    }
}
