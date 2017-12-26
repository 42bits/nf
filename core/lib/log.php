<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 23:00
 */

namespace core\lib;

class log
{
    static $class ;

    public static function init(){
        $drive = conf::get('log','DRIVE');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    public static function log($name,$file='log'){
        self::$class->log($name,$file);
    }

}