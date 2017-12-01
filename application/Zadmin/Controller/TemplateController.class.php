<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 20:07
 */

namespace Zadmin\Controller;


class TemplateController extends \Basic\Controller\TemplateController
{
    public function _initialize() {
        $this->isNeedLogin = true;
        parent::_initialize();
    }
}