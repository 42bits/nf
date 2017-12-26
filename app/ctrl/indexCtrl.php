<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 20:08
 */
namespace app\ctrl;

use core\lib\mode;

class indexCtrl extends \core\nf
{
    public function index(){
//        $model = new mode();
//        $ret = $model->select('t_user','*');
//        p($ret);
        $title = 'it is a php 框架!';
        $data = 'hello world !';
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');
    }
    public function test(){
        $title = 'it is a php 框架!';
        $data = 'hello world test !';
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');
    }
}