<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 21:13
 */

namespace Basic\Business\User;


use Basic\Model\User\UsersLoginLogModel;

class UsersLoginLogBusiness
{
    private static $_instance = null;

    private function __construct() {
    }

    private function __clone() {
    }

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function addLoginLog($loginLog) {
        return UsersLoginLogModel::instance()->insertData($loginLog);
    }
}