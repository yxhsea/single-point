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
        return $next($request);
    }
}
