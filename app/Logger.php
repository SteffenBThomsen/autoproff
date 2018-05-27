<?php

namespace AutoProff\App;


class Logger
{
    private static $logFile = 'log.txt';

    public static function log($data)
    {
        if (is_object($data)) {
            file_put_contents(self::$logFile, print_r((array) $data, true), FILE_APPEND);
            file_put_contents(self::$logFile, "\n\n", FILE_APPEND);
        }
        else if (is_array($data)) {
            file_put_contents(self::$logFile, print_r($data, true), FILE_APPEND);
            file_put_contents(self::$logFile, "\n\n", FILE_APPEND);
        } else {
            file_put_contents(self::$logFile, $data . "\n\n", FILE_APPEND);
            file_put_contents(self::$logFile, "\n\n", FILE_APPEND);
        }

    }


}