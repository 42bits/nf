<?php
/**
 * Created by PhpStorm.
 * User: congxi
 * Date: 2017/12/23
 * Time: 20:47
 */

namespace core\lib;

class mode extends \PDO
{
    public function __construct()
    {
        $dataBase = conf::get('dataBase');
        try{
            parent::__construct($dataBase['DSN'], $dataBase['USERNAME'], $dataBase['PASSWD']);
        }catch (\PDOException $e){
            p($e->getMessage());
        }
    }
}