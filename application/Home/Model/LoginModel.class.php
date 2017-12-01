<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 20:29
 */

namespace Home\Model;


use Basic\Business\User\UsersBusiness;
use Basic\Constant\Result;

class LoginModel
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

    public function checkUserPassword($userId, $password) {
        if (empty($userId) || empty($password)) {
            return Result::returnFailed('用户名和密码不能为空!');
        }

        $userInfo = UsersBusiness::instance()->getInfoByUserId($userId, array('password'));
        if (empty($userInfo)) {
            return Result::returnFailed('用户名不存在!');
        }

        $oldPassword = $userInfo['password'];

        if ($this->confirmPassword($password, $oldPassword)) {
            return Result::returnSuccess('登陆成功');
        } else {
            return Result::returnFailed('密码错误!');
        }
    }

    private function confirmPassword($nowPassword, $oldPassword) {
        $_oldPassword = base64_decode($oldPassword);
        $salt = substr($_oldPassword, 20);
        $hash = base64_encode(sha1(md5($nowPassword) . $salt, true) . $salt);
        return strcmp($hash, $oldPassword) == 0;
    }
}