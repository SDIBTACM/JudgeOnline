<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 27/11/2017 23:55
 */

namespace Teacher\Controller;


class TemplateController extends \Basic\Controller\TemplateController
{
    public function _initialize() {
        $this->isNeedLogin = true;
        parent::_initialize();
    }
}