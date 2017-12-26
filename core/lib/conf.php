<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 22:00
 */

namespace core\lib;

class conf
{
    public static $conf = [];
    public static function get($name,$key = ''){
        if(!isset(self::$conf[$name])){
            $confFile = NF.'/core/config/'.$name.'.php';
            if(is_file($confFile)){
                self::$conf[$name] = include $confFile;
            }else{
                return false;
            }
        }
            if(empty($key)){
                return self::$conf[$name];
            }else{
                return isset(self::$conf[$name][$key]) ? self::$conf[$name][$key] : false;
            }

    }
}