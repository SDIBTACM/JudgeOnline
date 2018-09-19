<?php
/**
 *
 * Created by Dream.
 * User: Boxjan
 * Datetime: 18-9-18 下午8:58
 */

namespace Home\Controller;


class TemplateMustLoginController extends TemplateController
{
    public function _initialize() {
        $this->isNeedLogin = true;
        parent::_initialize();
    }
}