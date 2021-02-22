<?php

class Connection 
{
    public $pdo;
    private $config = [];

    public function __construct()
    {
        $this->config = require_once DB_CONFIG;
        $dsn = $this->makeDsn($this->config['db']);

        try{
            $this->pdo = new PDO($dsn, $this->config['user'], $this->config['password'], $this->config['options']);
        }catch(PDOException $e){
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }


    private function makeDsn(array $config){
        $dsn = $config['driver'].':';
        unset($config['driver']);
        foreach ($config as $key => $value) {
            $dsn .= $key.'='.$value.';';
        }
        return substr($dsn, 0, -1);
    }
}