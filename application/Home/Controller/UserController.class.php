<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 20:21
 */

namespace Home\Controller;


use Home\Model\LoginModel;

class UserController extends TemplateController
{
    public function _initialize() {
        parent::_initialize();
    }

    public function register() {
        $this->auto_display();
    }

    public function login() {
        $this->auto_display();
    }

    public function modify() {
        $this->auto_display();
    }

    public function doLogin() {
        if (!empty($this->userInfo['user_id'])) {
            $this->alertError('您已经登陆!');
        }

        $userId = I('post.userId', '', 'trim,htmlspecialchars');
        $password = I('post.password', '', 'trim,htmlspecialchars');

        $result = LoginModel::instance()->checkUserPassword($userId, $password);
        if (!$result->isSuccess()) {
            $this->alertError($result->getMessage());
        }

        // TODO vip contest check

        // TODO init session

        // TODO init login log
    }

    public function doLogout() {
        session('user_id', null);
        session_destroy();
        $this->success('记得下次再来AC哦!', U('Index/index'), 2);
    }

    public function doRegister() {

    }
}