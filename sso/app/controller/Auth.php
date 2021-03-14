<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Cookie;
use think\facade\Session;
use think\facade\Env;
use SSOAuth;

class Auth extends BaseController
{
    const DEFAULT_REDIRECT_URI = '/index/index';

    /**
     * 登录授权
     * @return string
     */
    public function show()
    {
        $responseType = input(SSOAuth::PARAM_RESPONSE_TYPE);
        $clientId     = input(SSOAuth::PARAM_CLIENT_ID);
        $redirectUri  = input(SSOAuth::PARAM_REDIRECT_URI);
        $scope        = input(SSOAuth::PARAM_SCOPE);
        $state        = input(SSOAuth::PARAM_STATE);

        if (! empty($clientId)) {
            $params = [
                SSOAuth::PARAM_RESPONSE_TYPE => $responseType,
                SSOAuth::PARAM_CLIENT_ID     => $clientId,
                SSOAuth::PARAM_REDIRECT_URI  => $redirectUri,
                SSOAuth::PARAM_SCOPE         => $scope,
                SSOAuth::PARAM_STATE         => $state
            ];

            $result = SSOAuth::verifyAuth($params);
            if ($result['is_auth']) {
                header("location: {$result['redirect_url']}");
            }
        }

        if (empty($redirectUri)) {
            $redirectUri = 'http://' . request()->server('HTTP_HOST') . '/' . self::DEFAULT_REDIRECT_URI;
        }

        View::assign(['redirect_uri' => $redirectUri]);
        return View::fetch('auth/show');
    }

    /**
     * 获取 AccessToken
     */
    public function token()
    {
        $grantType    = input(SSOAuth::PARAM_GRANT_TYPE);
        $code         = input(SSOAuth::PARAM_CODE);
        $redirectUri  = input(SSOAuth::PARAM_REDIRECT_URI);
        $clientId     = input(SSOAuth::PARAM_CLIENT_ID);
        $clientSecret = input(SSOAuth::PARAM_CLIENT_SECRET);

        $params = [
            SSOAuth::PARAM_GRANT_TYPE    => $grantType,
            SSOAuth::PARAM_CODE          => $code,
            SSOAuth::PARAM_REDIRECT_URI  => $redirectUri,
            SSOAuth::PARAM_CLIENT_ID     => $clientId,
            SSOAuth::PARAM_CLIENT_SECRET => $clientSecret
        ];

        $accessToken = SSOAuth::getAccessToken($params);
        return json([
            'code' => 0,
            'data' => [
                'access_token'  => $accessToken,
                'token_type'    => 'mac',
                'expires_in'    => 3600,
                'refresh_token' => $accessToken,
                'scope'         => 'all'
            ]
        ]);
    }

    /**
     * 验证账号密码
     * @return \think\response\Json
     */
    public function verify()
    {
        $redirectUri = input('redirect_uri');
        $account     = input('account');
        $password    = input('password');

        if ($account != 'admin' || $password != 'admin') {
            return json(['code' => -1, 'msg' => '账号密码错误']);
        }

        $code = SSOAuth::generateAccessToken();
        $response = json(['code' => 0, 'msg' => 'success', 'data' => ['redirect_url' => $redirectUri . '?code=' . $code]]);
        return $response;
    }

    /**
     * 退出登录
     * @return string
     */
    public function logout()
    {
        SSOAuth::deleteAccessToken();
        return json(['code' => 0, 'msg' => 'success']);
    }
}
