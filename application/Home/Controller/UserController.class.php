<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 20:21
 */

namespace Home\Controller;


use Basic\Plugin\Log;
use Home\Model\LoginModel;
use Home\Model\UsersPrivilegeModel;

class UserController extends TemplateController
{
    public function _initialize() {
        parent::_initialize();
    }

    public function register() {
        $this->auto_display();
    }

    public function login() {
        $this->initUserInfo();
        if (!empty($this->userInfo['user_id'])) {
            return $this->alertError('您已经登陆!', U('Index/index'));
        }

        if (IS_POST) {
            return $this->doLogin();
        } else {
            return $this->auto_display();
        }
    }

    public function logout() {
        $this->initUserInfo();
        if (empty($this->userInfo['user_id'])) {
            $this->alertError('您未登陆!', U('Home/User/login'));
        }

        return $this->doLogout();
    }

    public function modify() {
        $this->initUserInfo();
        if (empty($this->userInfo['user_id'])) {
            $this->alertError('您未登陆!', U('Home/User/login'));
        }

        if (IS_POST) {
            //TODO update user info
        } else {
            return $this->auto_display();
        }
    }

    public function doLogin() {

        $userId = I('post.username', '', 'trim,htmlspecialchars');
        $password = I('post.password', '', 'trim,htmlspecialchars');

        $result = LoginModel::instance()->checkUserPassword($userId, $password);
        if (!$result->isSuccess()) {
            log::info("{} login fail! reason: {}", $userId, $result->getMessage());
            $this->alertError($result->getMessage());
        }

        // TODO vip contest check

        session('user_id', $userId);

        if (UsersPrivilegeModel::isAdmin($userId)) {
            session('administrator', 1);
        }
        if (UsersPrivilegeModel::isProblemSetter($userId)) {
            session('problem_editor', 1);
        }
        if (UsersPrivilegeModel::isContestCreator($userId)) {
            session('contest_creator', 1);
        }
        if (UsersPrivilegeModel::isSourceBrowser($userId)) {
            session('source_browser', 1);
        }
        Log::info("{} login success", $userId);

    }

    public function doLogout() {
        session('user_id', null);
        session_destroy();
        $this->success('记得下次再来AC哦!', U('Index/index'), 2);
    }

    public function doRegister() {

    }
}