<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 28/11/2017 00:58
 */

namespace Basic\Model\Extra;


use Basic\Constant\DataBaseTableConfig;
use Basic\Model\BasicBaseModel;

class MessageModel extends BasicBaseModel
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
        return DataBaseTableConfig::EXTRA_MESSAGE;
    }

    protected function getPrimaryId() {
        return "message_id";
    }


}