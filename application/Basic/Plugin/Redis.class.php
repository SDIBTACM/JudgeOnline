<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 5/29/18 16:45
 */

namespace Basic\Plugin;


/**
 * Redis缓存驱动
 * 要求安装phpredis扩展：https://github.com/phpredis/phpredis
 */

class Redis
{
    protected $handle;

    public function __construct() {
        if ( !extension_loaded('redis') ) {
            E(L('_NOT_SUPPORT_').':redis');
        }

        $options = array (
            'host'          => C('REDIS_HOST') ? : '127.0.0.1',
            'port'          => C('REDIS_PORT') ? : 6379,
            'timeout'       => C('DATA_CACHE_TIMEOUT') ? : 0,
            'persistent'    => false,
        );

        $this->handle = new \Redis();
        $this->handle->connect($options['host'], $options['port'], $options['timeout']);
    }

    public function __destruct() {
        $this->handle->close();
    }

}