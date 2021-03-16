<?php

// +----------------------------------------------------------------------
// | SSO Server 配置
// +----------------------------------------------------------------------

return [
    'domain'        => env('sso_server.domain', ''),
    'auth_path'     => env('sso_server.auth_path', ''),
    'token_path'    => env('sso_server.token_path', ''),
    'client_id'     => env('sso_server.client_id', ''),
    'client_secret' => env('sso_server.client_secret', ''),
];
