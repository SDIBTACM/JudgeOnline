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

class RedisList
{
    protected $listName;

    protected $handle;

    public function __construct($listName){
        if ( !extension_loaded('redis') ) {
            E(L('_NOT_SUPPORT_').':redis');
        }

        $option = array (
            'host'          => C('REDIS_HOST') ? : '127.0.0.1',
            'port'          => C('REDIS_PORT') ? : 6379,
            'timeout'       => C('DATA_CACHE_TIMEOUT') ? : false,
        );
        $this->listName = $listName;

        $this->handle = new \Redis();
        $status = true;
        try {
            $status = $this->handle->pconnect($option['host'], $option['port'], $option['timeout']);
        } catch(\Exception $e) {
            E("Redis Connect Fail!");
        }
        if ($status === false) E("Redis Connect Fail!");
    }

    public function push($data) {
        $status = $this->handle->lPush($this->listName, $data);
        if ($status === false) {
            \Think\Log::record("Redis list push error!");
            Log::error("Redis list push error!");
        }
    }

    public function pop() {
        $res = $this->handle->rPop($this->listName);
        if($$res === false) {
            \Think\Log::record("Redis list pop error!");
            Log::error("Redis list pop error!");
        }
        return $res;
    }

}