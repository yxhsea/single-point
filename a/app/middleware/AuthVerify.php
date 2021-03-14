<?php
/**
 * Created by PhpStorm.
 * User: yxhsea
 * Date: 2021/3/6
 * Time: 17:16
 */

namespace app\middleware;

use SSOServer;

class AuthVerify
{
    public function handle($request, \Closure $next)
    {
        $accessToken = cookie(SSOServer::ACCESS_TOKEN);
        if (is_null($accessToken)) {
            $code = input(SSOServer::PARAM_CODE);
            if (empty($code)) {
                $redirectUrl = SSOServer::getRedirectUrl();
                header("location: {$redirectUrl}");
            }

            SSOServer::getAccessToken($code, 'http://' . request()->server('HTTP_HOST') . '/'. request()->pathinfo());
        }

//        else {
            if (! SSOServer::verifyAccessToken()) {
//                $redirectUrl = SSOServer::getRedirectUrl();
//                header("location: {$redirectUrl}");
            }
//        }

        return $next($request);
    }
}
