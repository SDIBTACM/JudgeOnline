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
    private static $writingLogNow = 0;
    private static $logRecorded = array();

    /**
     * @example Log::info("user: {}  ip: {}  balabala", $user, $ip)
     */

    public static function info() {
        $_message['time'] = self::microtime2string();
        $_message['level'] = "Info";
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $message = self::dealBacktrace($backtrace);
        self::SaveLog($message + $_message);
    }

    /**
     * @example Log::warn("user: {}  ip: {}  balabala", $user, $ip)
     */

    public static function warn() {
        $_message['time'] = self::microtime2string();
        $_message['level'] = "Warn";
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $message = self::dealBacktrace($backtrace);
        self::SaveLog($message + $_message);

    }

    /**
     * @example Log::error("user: {}  ip: {}  balabala", $user, $ip)
     */

    public static function error() {
        $_message['time'] = self::microtime2string();
        $_message['level'] = "Error";
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $message = self::dealBacktrace($backtrace);
        self::SaveLog($message + $_message);

    }

    private static function microtime2string()
    {
        list($sec, $tsec) = explode(" ", microtime());
        return date("Y-m-d H:i:s", $tsec) . "." . sprintf("%04d", ((int)($sec * 10000)));
    }

    private static function dealBacktrace($backtrace)
    {
        $upOneLevel = $backtrace[0];
        $upTwoLevel = $backtrace[1];

        $message = self::getMessage($upOneLevel['args']);

        $upstream  = array(
            'line' => $upOneLevel['line'],
            'function' => $upTwoLevel['function'],
            'class' => $upOneLevel['class'],
            'file' => $upOneLevel['file']
        );

        return $message + $upstream;

    }

    private static function getMessage($argvWillDeal) {

        $message['string'] = $argvWillDeal[0];
        $message['data'] = array();
        $message['finallyString'] = '';

        for ($i = 1; $i < sizeof($argvWillDeal); $i += 1 ) {
            array_push($message['data'], $argvWillDeal[$i]);
        }

        $message['string'] = str_replace('{}', "%s", $message['string']);

        $message['finallyString'] = vsprintf($message['string'], $message['data']);

        return $message;
    }

    private static function SaveLog($message) {

        $willWriteMessage = $message['time'] .
            "  Level: " . $message['level'] .
            "  Filename: " . $message['file'] .
            "  Class: " . $message['class'] .
            "  Function: " . $message['function'] .
            "  Line: " . $message['line'] .
            "  Message: " . $message['finallyString'] . "\n";

        array_push(self::$logRecorded, $willWriteMessage);

        self::writeToFile();

    }

    private static function writeToFile() {

        if(self::$writingLogNow === 0)
            self::$writingLogNow = 1;
        else
            return ;

        if (is_null(self::$logRecorded))
            return ;

        $logFilePath = C('log_file_path');
        $logNameFormat = C('log_name_format');
        $logFileMaxSize = C('log_max_size');


        if (is_dir($logFilePath)) {
            mkdir($logFilePath, 0755, true);
        }

        $fileName = $logFilePath . date($logNameFormat) . ".log";

        foreach (self::$logRecorded as $oneMessage)
            error_log($oneMessage, 3, $fileName);

        if ($logFileMaxSize - filesize($fileName) <= 10240)
            rename($fileName, $fileName = $logFilePath .
                date($logNameFormat) . date("-H:i:s") . ".log");

        self::$writingLogNow = 0;
        self::$logRecorded = array();

    }

}