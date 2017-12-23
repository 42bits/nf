<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 18:52
 */

namespace core\lib;

class route
{
    public $ctrl;
    public $action;
    /*
     * 隐藏index.php
     * 获取url参数部分
     * 返回控制器和方法
     */
    public function __construct()
    {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !='/'){
            $pathArr = explode('/',trim($_SERVER['REQUEST_URI'],'/'));
            if(isset($pathArr[0])){
                $this->ctrl = $pathArr[0];
                unset($pathArr[0]);
            }
            if(isset($pathArr[1])){
                $this->action = $pathArr[1];
                unset($pathArr[1]);
            }else{
                $this->action = conf::get('route','ACTION');
            }
            $count = count($pathArr) + 2;
            $i = 2;
            while ($i < $count){
                if(isset($pathArr[$i + 1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i += 2;
            }
        }else{
            $this->ctrl = conf::get('route','CTRL');;
            $this->action = conf::get('route','ACTION');;
        }
    }
}