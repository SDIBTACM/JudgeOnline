<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 12/11/17 12:07
 */

namespace Basic\Plugin\Log;
namespace Basic\Log;

use Think\Controller;

class Log extends Controller
{
    private static $_instance = null;
    private static $_upstream = null;
    private static $_message = null;

    private static $config = array(
        'logFilePath' => '/Runtime/Log',
        'nameFormat' => 'Y-m-d',
        'logFileMaxSize' => '10659840'
    );

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
    /**
     * @param $userid 用户ID,便于针对用户查错，如果无需记录，请传空字符串
     * @param $message 消息,遵循php vsprint的占位符
     */

    public static function record($userid = "", $message)
    {
        self::$_message['time']  = self::microtime2string();
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        if($userid !== "")
            self::$_message['userid'] = $userid;
        self::dealBacktrace($backtrace);
        self::writeLog();

    }

    private static function microtime2string()
    {
        list($msec, $sec) = explode(" ", microtime());
        return date("Y-m-d H:i:s") . "." . sprintf("%04d",((int)($msec * 10000)));
    }

    private static function dealBacktrace($backtrace)
    {
        $upOneLevel = $backtrace[0];
        $upTwoLevel = $backtrace[1];

        self::getMessage($upOneLevel['args']);

        self::$_upstream  = array(
            'line' => $upOneLevel['line'],
            'function' => $upTwoLevel['function'],
            'class' => $upOneLevel['class'],
            'file' => $upOneLevel['file']
        );

    }

    private static function getMessage($argvWillDeal) {

        self::$_message['ip'] = $_SERVER['REMOTE_ADDR'];

        self::$_message['string'] = $argvWillDeal[1];
        self::$_message['data'] = array();
        self::$_message['finallyString'] = '';

        for($i = 3; $i < sizeof($argvWillDeal); $i += 1 ) {
            array_push(self::$_message['data'], $argvWillDeal[$i]);
        }

        self::$_message['finallyString'] = vsprintf(self::$_message['string'], self::$_message['data']);

    }

    private static function writeLog() {

        if(is_dir(self::$config['logFilePath'])) {
            mkdir(self::$config['logFilePath'], 0755, true);
        }
        $fileName = self::$config['logFilePath'] . "/" . date(self::$config['nameFormat']) . "log";

        $logFileToWriteResource = fopen($fileName,"a");

        $willWriteMessage = self::$_message['time'] .
            "  Filename: " . self::$_upstream['file'] .
            "  Class: " . self::$_upstream['class'] .
            "  Function: " . self::$_upstream['function'] .
            "  Line: " . self::$_upstream['line'] .
            "  Ip: " . self::$_message['ip'] .
            "  User:" . self::$_message['userid'] .
            "  " . self::$_message['finallyString'];


        fwrite($logFileToWriteResource, $willWriteMessage);

        if(filesize($fileName) - self::$config['logFileMaxSize'] <= 2560)
            rename($fileName, $fileName = self::$config['logFilePath'] .
                "/" . date(self::$config['nameFormat']) . date("-H:i:s") . "log");

    }

}