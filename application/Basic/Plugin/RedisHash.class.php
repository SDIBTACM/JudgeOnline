<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/5/18 19:44
 */

namespace  Basic\Plugin;

class RedisSet extends Redis
{
    protected $hashName = null;

    public static function instance($hashname) {
        $_instance = new self;
        $_instance->hashName = $hashname;
        return $_instance;
    }

    public function set($key, $data) {
        return $this->handle->hSet($this->hashName, $key, $data);
    }

    public function get($key) {
        return $this->handle->hGet($this->hashName, $key);
    }

    public function getNum() {
        return $this->handle->hLen($this->hashName);
    }

    public funtion clear() {
        $keys = $this->handle->hKeys($this->hashName);
        foreach ($keys as $key) $this->handle->hDel($this->hashName, $key);
        return $this->getNum();
    }
}
