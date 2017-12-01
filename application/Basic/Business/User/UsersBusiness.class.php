<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 20:57
 */

namespace Basic\Business\User;


use Basic\Model\User\UsersModel;

class UsersBusiness
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

    public function getInfoByUserId($userId, $field = array()) {
        return UsersModel::instance()->getById($userId, $field);
    }

    public function getInfoListByUserIds($userIds, $field = array()) {
        if (empty($userIds)) {
            return array();
        }

        $where = array(
            'user_id' => array('in', $userIds)
        );

        return UsersModel::instance()->queryAll($where, $field);
    }
}