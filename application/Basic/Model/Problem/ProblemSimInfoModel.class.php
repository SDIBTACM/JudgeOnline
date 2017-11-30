<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/30/17 16:14
 */

namespace Basic\Model\Problem;

use Basic\Model\BasicBaseModel;
use Basic\Constant\DataBaseTableConfig;

class ProblemSimInfoModel extends BasicBaseModel
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

    protected function getTableName() {
        return DataBaseTableConfig::PROBLEM_SIM;
    }

    protected function getPrimaryId() {
        return "s_id";
    }

}