<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 20:47
 */

namespace core\lib;

use Medoo\Medoo;

class mode extends Medoo
{
    public function __construct()
    {
        $dataBase = conf::get('dataBase');
        parent::__construct($dataBase);
    }
}