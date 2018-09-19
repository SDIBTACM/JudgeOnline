<?php
/**
 *
 * Created by Dream.
 * User: Boxjan
 * Datetime: 18-9-16 下午1:10
 */

namespace Think\Session\Driver;

class Redis
{
    /** @var \Redis */
    protected $handler = null;
    protected $config  = array(
        'prefix' => 'PHPSession_'
    );

    /**
     * 打开Session
     * @access public
     * @param string $savePath
     * @param mixed  $sessName
     * @return bool
     * @throws Exception
     */
    public function open($savePath, $sessName)
    {
        // 检测php环境
        if (!extension_loaded('redis')) {
            // throw new Exception('not support:redis');
            echo 'not support:redis';
        }
        $this->handler = new \Redis;
        // 建立连接

        $this->config['host'] = C('REDIS_HOST') ? C('REDIS_HOST') : '127.0.0.1';
        $this->config['port'] = C('REDIS_PORT') ? C('REDIS_PORT') : 6379;
        $this->config['password'] = C('REDIS_PASSWORD') ? C('REDIS_PASSWORD') : '';
        $this->config['timeout'] = C('REDIS_TIMEOUT') ? C('REDIS_TIMEOUT') : 0;
        $this->config['select'] = C('REDIS_SELECT') ? C('REDIS_SELECT') : 0;

        $this->config['expire'] = C('SESSION_EXPIRE') ? C('SESSION_EXPIRE') : 3600;
        $this->config['persistent'] = C('REDIS_PERSISTENT') ? C('REDIS_PERSISTENT') : true;

        $func = $this->config['persistent'] ? 'pconnect' : 'connect';
        $this->handler->$func($this->config['host'], $this->config['port'], $this->config['timeout']);
        if ('' != $this->config['password']) {
            $this->handler->auth($this->config['password']);
        }
        if (0 != $this->config['select']) {
            $this->handler->select($this->config['select']);
        }
        return $this->handler->ping() == 'PONG';
    }
    /**
     * 关闭Session
     * @access public
     */
    public function close()
    {
        $this->gc(ini_get('session.gc_maxlifetime'));
        $this->handler->close();
        $this->handler = null;
        return true;
    }
    /**
     * 读取Session
     * @access public
     * @param string $sessID
     * @return string
     */
    public function read($sessID)
    {
        return (string) $this->handler->get($this->config['prefix'] . $sessID);
    }
    /**
     * 写入Session
     * @access public
     * @param string $sessID
     * @param String $sessData
     * @return bool
     */
    public function write($sessID, $sessData)
    {

        if ($this->config['expire'] > 0) {
            return $this->handler->setex($this->config['prefix'] . $sessID, $this->config['expire'], $sessData);
        } else {
            return $this->handler->set($this->config['prefix'] . $sessID, $sessData);
        }
    }
    /**
     * 删除Session
     * @access public
     * @param string $sessID
     * @return bool
     */
    public function destroy($sessID)
    {
        return $this->handler->delete($this->config['prefix'] . $sessID) > 0;
    }
    /**
     * Session 垃圾回收
     * @access public
     * @param string $sessMaxLifeTime
     * @return bool
     */
    public function gc($sessMaxLifeTime)
    {
        return true;
    }
}