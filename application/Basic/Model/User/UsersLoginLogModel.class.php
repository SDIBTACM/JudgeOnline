<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/30/17 14:59
 */

namespace Basic\Model\User;

use Basic\Constant\DataBaseTableConfig;
use Basic\Model\BasicBaseModel;

class UsersLoginLogModel extends BasicBaseModel
{
    private static $_instace = null;

    private function __construct() {
    }

    private function __clone() {
    }

    public static function instance() {
        if (is_null(self::$_instace)) {
            self::$_instace = new self;
        }
        return self::$_instace;
    }

    protected function getTableName() {
        return DataBaseTableConfig::USER_LOGIN_LOG;
    }

    protected function getPrimaryId() {
        return "user_id";
    }
}