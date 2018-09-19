<?php
/**
 *
 * Created by Dream.
 * User: Boxjan
 * Datetime: 18-9-19 下午12:29
 */

namespace Home\Model;

class UsersPrivilegeModel
{
    public static function isAdmin($userId) {
        return self::isExists($userId, 'administrator');
    }

    public static function isContestCreator($userId) {
        return self::isExists($userId, 'contest_creator');
    }

    public static function isProblemSetter($userId) {
        return self::isExists($userId, 'problem_editor');
    }

    public static function isSourceBrowser($userId) {
        return self::isExists($userId, 'administrator');
    }

    private static function isExists($userId, $privilege){
        return array_search($privilege, \Basic\Model\User\UsersPrivilegeModel::instance()->queryOne(
            array('user_id' => $userId,'rightstr' => $privilege), array('rightstr')));
    }
}