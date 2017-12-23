<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 20:08
 */
namespace app\ctrl;

class indexCtrl
{
    public function index(){
        $model = new \core\lib\mode();
        $sql = "select * from t_user";
        $ret = $model->query($sql);
        p($ret->fetchAll(\PDO::FETCH_UNIQUE));
    }
}