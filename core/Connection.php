<?php
namespace Core;

use PDO;

class Connection 
{
    private static $config = [];
    private static $instance;

    protected function __construct()
    {
    }

    private function __clone()
    {
    }
    public function __wakeup()
    {
    }
    public static function connect()
    {
        self::$config = require_once DB_CONFIG;
        if (!self::$instance) {
            $dsn = self::makeDsn(self::$config['db']);
            try {
                self::$instance = new PDO($dsn, self::$config['user'], self::$config['password'], self::$config['options']);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), $e->getCode());
            }
        }
        return self::$instance;
    }

    private static function makeDsn(array $config){
        $dsn = $config['driver'].':';
        unset($config['driver']);
        foreach ($config as $key => $value) {
            $dsn .= $key.'='.$value.';';
        }
        return substr($dsn, 0, -1);
    }
}