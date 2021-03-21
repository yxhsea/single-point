<?php
namespace app\controller;

use app\BaseController;
use app\model\SsoInfo;
use think\facade\Db;

class Api extends BaseController
{
    public function list()
    {
        $rows = Db::table(SsoInfo::TABLE_NAME)->select()->toArray();
        return json(['code' => 0, 'msg' => 'success', 'data' => $rows]);
    }

    public function info() {
        $id = input('id');
        $row = Db::table(SsoInfo::TABLE_NAME)->where('id', $id)->find();
        return json(['code' => 0, 'msg' => 'success', 'data' => $row]);
    }

    public function save()
    {
        $id           = input(SsoInfo::COLUMN_ID);
        $name         = input(SsoInfo::COLUMN_NAME);
        $clientId     = input(SsoInfo::COLUMN_CLIENT_ID);
        $clientSecret = input(SsoInfo::COLUMN_CLIENT_SECRET);
        $redirectUrl  = input(SsoInfo::COLUMN_REDIRECT_URI);
        $logoutUrl    = input(SsoInfo::COLUMN_LOGOUT_URI);
        $status       = input(SsoInfo::COLUMN_STATUS);

        if (empty($id)) {
            Db::table(SsoInfo::TABLE_NAME)->insert(
                [
                    SsoInfo::COLUMN_NAME          => $name,
                    SsoInfo::COLUMN_ID            => $clientId,
                    SsoInfo::COLUMN_CLIENT_SECRET => $clientSecret,
                    SsoInfo::COLUMN_REDIRECT_URI  => $redirectUrl,
                    SsoInfo::COLUMN_LOGOUT_URI    => $logoutUrl,
                    SsoInfo::COLUMN_STATUS        => $status,
                    SsoInfo::COLUMN_CREATED_AT    => date('Y-m-d H:i:s'),
                    SsoInfo::COLUMN_UPDATED_AT    => date('Y-m-d H:i:s')
                ]
            );
        }

        Db::table(SsoInfo::TABLE_NAME)->where(SsoInfo::COLUMN_ID, $id)->update(
            [
                SsoInfo::COLUMN_NAME          => $name,
                SsoInfo::COLUMN_ID            => $clientId,
                SsoInfo::COLUMN_CLIENT_SECRET => $clientSecret,
                SsoInfo::COLUMN_REDIRECT_URI  => $redirectUrl,
                SsoInfo::COLUMN_LOGOUT_URI    => $logoutUrl,
                SsoInfo::COLUMN_STATUS        => $status,
                SsoInfo::COLUMN_UPDATED_AT    => date('Y-m-d H:i:s')
            ]
        );

        return json(['code' => 0, 'msg' => 'success']);
    }
}
