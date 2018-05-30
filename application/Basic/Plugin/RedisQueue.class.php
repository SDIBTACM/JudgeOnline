<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 5/30/18 11:26
 */

namespace Basic\Plugin;

class RedisQueue extends Redis
{

    protected $listName = null;

    public static function instance($listname) {
        $_instance = new self;
        $_instance->listName = $listname;
        return $_instance;
    }

    public function getLen() {
        return $this->handle->lLen($this->listName);
    }

    public function push($data) {
        return $this->handle->lPush($this->listName,$data);
    }

    public function pop() {
        return $this->handle->rPop($this->listName);
    }

    public function clear() {
        while($this->getLen() != 0)
            $this->pop();
    }
}
