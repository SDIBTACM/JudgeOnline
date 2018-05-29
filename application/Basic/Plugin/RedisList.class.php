<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 5/29/18 16:45
 */

namespace Basic\Plugin;

use Think\Cache\Driver\Redis;
/**
 * Redis缓存驱动
 * 要求安装phpredis扩展：https://github.com/phpredis/phpredis
 */

class RedisList extends Redis
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
    
}