<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/30/17 15:28
 */

namespace Basic\Model\Problem;

use Basic\Constant\DataBaseTableConfig;
use Basic\Model\BasicBaseModel;

class ProblemCompileInfoModel extends BasicBaseModel
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
        return DataBaseTableConfig::PROBLEM_COMPILE_INFO;
    }

    protected function getPrimaryId() {
        return "solution_id";
    }

}