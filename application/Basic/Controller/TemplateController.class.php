<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 27/11/2017 22:47
 */

namespace Basic\Controller;


use Basic\Business\User\UsersBusiness;
use Think\Controller;

class TemplateController extends Controller
{
    protected $userInfo = null;

    protected $isNeedLogin = false;  // 是否需要登陆
    protected $isNeedFilterSql = false; // 是否需要 sql 过滤
    protected $isOnlyForTeacher = false;
    protected $isOnlyForAdmin = false;

    public $module = null;
    public $controller = null;
    public $action = null;

    public function _initialize() {

        header("Pragma: no-cache");
        // HTTP/1.0
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        // HTTP/1.1

        $this->module = strtolower(MODULE_NAME);
        $this->controller = strtolower(CONTROLLER_NAME);
        $this->action = strtolower(ACTION_NAME);

        $this->initSqlInjectionFilter();
        $this->initLoginUserInfo();
    }

    public function _empty() {
        header("HTTP/1.1 404 Not Found");
        $this->display("./Public/ErrorPage/404.html");
    }

    private function initLoginUserInfo() {
        if (!$this->isNeedLogin) return;

        $userId = session('user_id');
        if (!empty($userId)) {
            // TODO
            $field = array('user_id', 'nick');
            $this->userInfo = UsersBusiness::instance()->getInfoByUserId($userId, $field);
        } else {
            redirect(U('Home/User/login'), 1, 'Please Login First!');
        }
    }

    private function initSqlInjectionFilter() {
        if (function_exists('sqlInjectionFilter') && $this->isNeedFilterSql) {
            sqlInjectionFilter();
        }
    }

    protected function alertError($errMsg, $url = '') {
        $url = empty($url) ? "window.history.back();" : "location.href=\"{$url}\";";
        echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
        echo "<script>function myTips(){alert('{$errMsg}');{$url}}</script>";
        echo "</head><body onload='myTips()'></body></html>";
        exit;
    }

    protected function auto_display($view = null, $layout = true) {
        layout($layout);
        $this->display($view);
    }

    protected function zadd($name, $data) {
        $this->assign($name, $data);
    }

    // TODO 英文单词错误, 但是考试系统中也用到, 目前先不改, 等迁移完考试系统
    protected function ZaddWidgets($widgets) {
        foreach ($widgets as $name => $data) {
            $this->zadd($name, $data);
        }
    }

    protected function isSuperAdmin() {
        $isAdmin = session('administrator');
        return !empty($isAdmin);
    }

    protected function isCreator() {
        if ($this->isSuperAdmin()) {
            return true;
        }
        $isCreator = session('contest_creator');
        return !empty($isCreator);
    }

    protected function isProblemSetter() {
        if ($this->isSuperAdmin()) {
            return true;
        }
        $isSetter = session('problem_editor');
        return !empty($isSetter);
    }

    protected function isTeacher() {
        if ($this->isSuperAdmin() || $this->isCreator() || $this->isProblemSetter()) {
            return true;
        } else {
            return false;
        }
    }
}