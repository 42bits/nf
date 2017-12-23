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
        $dsn = 'mysql:host=localhost;dbname=test';
        $username = 'root';
        $passwd= '';
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            p($e->getMessage());
        }
    }
}