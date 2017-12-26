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
    public $assign;
    public static function run()
    {
        \core\lib\log::init();
        $route = new \core\lib\route;
        $ctrl = $route->ctrl;
        $action = $route->action;
        $ctrlClass = '\\' . MODULE . '\ctrl\\' . $ctrl . 'Ctrl';
        $ctrlC = new $ctrlClass;
        $ctrlC->$action();
        \core\lib\log::log('ctrl:'.$ctrl.' action:'.$action);
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
                throw new \Exception('找不到类文件:.' . $class);
            }
        }
    }

    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    public function display($file){
        $viewFile = APP.'/views/'.$file;
        if (is_file($viewFile)){
            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => NF.'/log/twig',
                'debug'=>DEBUG
            ));
            $template = $twig->load($file);
            $template->display($this->assign?$this->assign:'');
        }
    }
}