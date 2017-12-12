<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 12/11/17 12:07
 */

namespace Basic\Plugin\Log;
namespace Basic\Log;

class Log
{
    private $_upstream = null;
    private $_message = null;

    private static $logRecorded = array();

    /**
     * @example Log::info("user: {}  ip: {}  balabala", $user, $ip)
     */

    public static function info() {
        $recordLog = new Log();
        $recordLog->_message['time'] = self::microtime2string();
        $recordLog->_message['level'] = "Info";
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $recordLog->dealBacktrace($backtrace);
        $recordLog->SaveLog();
    }

    /**
     * @example Log::warn("user: {}  ip: {}  balabala", $user, $ip)
     */

    public static function warn() {
        $recordLog = new Log();
        $recordLog->_message['time'] = self::microtime2string();
        $recordLog->_message['level'] = "Warning";
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $recordLog->dealBacktrace($backtrace);
        $recordLog->SaveLog();

    }

    /**
     * @example Log::error("user: {}  ip: {}  balabala", $user, $ip)
     */

    public static function error() {
        $recordLog = new Log();
        $recordLog->_message['time'] = self::microtime2string();
        $recordLog->_message['level'] = "Error";
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $recordLog->dealBacktrace($backtrace);
        $recordLog->SaveLog();

    }

    private static function microtime2string()
    {
        list($sec, $tsec) = explode(" ", microtime());
        return date("Y-m-d H:i:s", $tsec) . "." . sprintf("%04d",((int)($sec * 10000)));
    }

    private function dealBacktrace($backtrace)
    {
        $upOneLevel = $backtrace[0];
        $upTwoLevel = $backtrace[1];

        $this->getMessage($upOneLevel['args']);

        $this->_upstream  = array(
            'line' => $upOneLevel['line'],
            'function' => $upTwoLevel['function'],
            'class' => $upOneLevel['class'],
            'file' => $upOneLevel['file']
        );

    }

    private function getMessage($argvWillDeal) {

        $this->_message['string'] = $argvWillDeal[0];
        $this->_message['data'] = array();
        $this->_message['finallyString'] = '';

        for($i = 1; $i < sizeof($argvWillDeal); $i += 1 ) {
            array_push($this->_message['data'], $argvWillDeal[$i]);
        }

        $this->_message['string'] = str_replace('{}', "%s", $this->_message['string']);

        $this->_message['finallyString'] = vsprintf($this->_message['string'], $this->_message['data']);
    }

    private function SaveLog() {

        $willWriteMessage = $this->_message['time'] .
            "  Filename: " . $this->_upstream['file'] .
            "  Class: " . $this->_upstream['class'] .
            "  Function: " . $this->_upstream['function'] .
            "  Level: " . $this->_message['level'] .
            "  Line: " . $this->_upstream['line'] .
            "  Message: " . $this->_message['finallyString'] . "\n";

        array_push(self::$logRecorded, $willWriteMessage);

        self::writeToFile();

    }

    private static function writeToFile() {

        $logFilePath = C('log_file_path');
        $logNameFormat = C('log_name_format');
        $logFileMaxSize = C('log_max_size');


        if(is_dir($logFilePath)) {
            mkdir($logFilePath, 0755, true);
        }

        $fileName = $logFilePath . date($logNameFormat) . 'log';

        $logFileToWriteResource = fopen($fileName,"a");

        foreach (self::$logRecorded as $oneMessage)
            fwrite($logFileToWriteResource, $oneMessage);

        if($logFileMaxSize - filesize($fileName) <= 10240)
            rename($fileName, $fileName = $logFilePath .
                date($logNameFormat) . date("-H:i:s") . "log");

        self::$logRecorded = array();

    }

}