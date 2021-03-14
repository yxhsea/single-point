<?php
namespace app\controller;

use app\BaseController;
use think\facade\Env;

class Index extends BaseController
{
    public function index()
    {
        // 判断本地的 cookie
        $accessToken = cookie('access_token');
        if (is_null($accessToken)) {
            $code = input('code');
            if (!empty($code)) {
                // code --> token
                $client = new \GuzzleHttp\Client();
                $response = $client->post(Env::get('auth.auth_token'), [
                    'form_params' => [  //参数组
                        'code' => $code
                    ],
                ]);

                $body = $response->getBody(); //获取响应体，对象
                $bodyArr = json_decode((string) $body, true); //对象转字串
                cookie('access_token', $bodyArr['data']['access_token']);
            } else {
                // 获取授权
                $responseType = 'code';
                $clientId = '123456';
                $redirectUri = 'http://www.b.com/' . request()->pathinfo();
                $scope = 'all';
                $state = 'test';

                $authUrl = Env::get('auth.auth_url');

                $url = $authUrl . "?response_type={$responseType}&client_id={$clientId}&redirect_uri={$redirectUri}&scope={$scope}&state={$state}";
                header('location: ' . $url);
            }
        }

        return "登录 B 系统成功";
    }
}
