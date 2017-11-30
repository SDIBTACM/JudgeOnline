<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/30/17 16:39
 */

namespace Basic\Model\Discuss;

use Basic\Constant\DataBaseTableConfig;
use Basic\Model\BasicBaseModel;

class DiscussReplyModel extends BasicBaseModel
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
        return DataBaseTableConfig::DISCUSS_REPLY;
    }

    protected function getPrimaryId() {
        return "rid";
    }

}