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
    protected $SetName = null;

    public static function instance($setname) {
        $_instance = new self;
        $_instance->setName = $setname;
        return $_instance;
    }

    public function add($willAdd) {
        return $this->handle->sAdd($this->setName, $willAdd);
    }

    public function pop() {
        return $this->handle->sPop($this->setName);
    }

    public function getSize() {
        return $this->handle->sSize($this->setName);
    }

    public function clear() {
        while ($this->handle->getSize())
            $this->handle->sPop($this->setName);
        return $this->handle->getSize();
    }

    public function delete($willDelete) {
        return $this->handle->sRem($this->setName, $willDelete)
    }
}