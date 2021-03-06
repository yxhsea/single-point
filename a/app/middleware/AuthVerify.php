<?php
/**
 * Created by PhpStorm.
 * User: yxhsea
 * Date: 2021/3/6
 * Time: 17:16
 */

namespace app\middleware;

class AuthVerify
{
    const TOKEN         = 'token';
    const SSO_LOGIN_URL = 'http://sso.erp.com/login';
    const REDIRECT_URL = 'http://a.erp.com/';

    public function handle($request, \Closure $next)
    {
        $token = cookie(self::TOKEN);
        if (empty($token)) {
            $redirectUrl = self::REDIRECT_URL . $request->pathinfo();
            return redirect(self::SSO_LOGIN_URL . '?redirect_url=' . $redirectUrl);
        }

        // 验证 token 的有效性
        // 1、可以直接从 redis 中获取 token 验证
        // 2、可以调用 oss 系统的 token 验证 API 接口

        return $next($request);
    }
}
