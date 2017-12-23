<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 20:08
 */
namespace app\ctrl;

class indexCtrl extends \core\nf
{
    public function index(){

        $title = 'it is a php 框架';
        $data = 'hello world';
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');
    }
}