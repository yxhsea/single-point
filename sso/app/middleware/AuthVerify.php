<?php
/**
 * Created by PhpStorm.
 * User: yxhsea
 * Date: 2021/3/6
 * Time: 17:16
 */

namespace app\middleware;

use SSOAuth;

class AuthVerify
{
    public function handle($request, \Closure $next)
    {
        if ($request->pathinfo() == 'auth/show') {
            return $next($request);
        }

        if (! SSOAuth::verifyAccessToken()) {
            return redirect('/auth/show');
        }

        return $next($request);
    }
}
