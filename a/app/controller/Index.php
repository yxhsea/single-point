<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;
use SSOServer;

class Index extends BaseController
{
    public function index()
    {
        View::assign(['redirect_url' => 'http://' . request()->server('HTTP_HOST') . '/'. request()->pathinfo()]);
        return View::fetch('index/index');
    }

    public function welcome()
    {
        return View::fetch('index/index');
    }

    public function token()
    {
        $code        = input(SSOServer::PARAM_CODE);
        $redirectUrl = input('redirect_url');

        $accessToken = SSOServer::getAccessToken($code, $redirectUrl);
        if (is_null($accessToken)) {
            return json(['code' => 1, 'msg' => 'success', 'data' => ['redirect_url' => SSOServer::getRedirectUrl($redirectUrl)]]);
        }

        return json(['code' => 0, 'msg' => 'success', 'data' => ['access_token' => $accessToken]]);
    }

    public function logout()
    {
        SSOServer::deleteAccessToken();
        return json(['code' => 0, 'msg' => 'success']);
    }

    public function proxy()
    {
        View::assign(['redirect_url' => 'http://' . request()->server('HTTP_HOST') . '/'. request()->pathinfo()]);
        return View::fetch('index/proxy');
    }
}
