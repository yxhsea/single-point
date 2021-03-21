<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class SsoInfo extends Model
{
    const TABLE_NAME           = 'sso_info';

    const COLUMN_ID            = 'id';
    const COLUMN_NAME          = 'name';
    const COLUMN_CLIENT_ID     = 'client_id';
    const COLUMN_CLIENT_SECRET = 'client_secret';
    const COLUMN_REDIRECT_URI  = 'redirect_uri';
    const COLUMN_LOGOUT_URI    = 'logout_uri';
    const COLUMN_STATUS        = 'status';
    const COLUMN_CREATED_AT    = 'created_at';
    const COLUMN_UPDATED_AT    = 'updated_at';
}
