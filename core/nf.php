<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 18:40
 */

namespace core;

class nf
{
    public static $classMap = [];

    public static function run()
    {
        $route = new \core\lib\route();
        $ctrlClss = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClss.'Ctrl.php';
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClss.'Ctrl';
        if(is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器:.'.$ctrlClss);
        }
    }

    public static function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = NF . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                throw new \Exception('找不到类文件:.'.$class);
            }
        }
    }
}