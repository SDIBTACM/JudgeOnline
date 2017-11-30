<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/30/17 16:20
 */

namespace Basic\Model\Problem;

use Basic\Constant\DataBaseTableConfig;
use Basic\Model\BasicBaseModel;

class ProblemSolutionInfoModel extends BasicBaseModel
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
        return DataBaseTableConfig::PROBLEM_SOLUTION;
    }

    protected function getPrimaryId() {
        return "solution_id";
    }

}