<?php

namespace ACore\Database;

class DoctrineDB {

    protected $conn;

    public function __construct($host, $name, $user = "", $pass = "", $port = 3306, $socket = "") {
        $config = new \Doctrine\DBAL\Configuration();

        $connectionParams = array(
            'dbname' => $name,
            'user' => $user,
            'password' => $pass,
            'host' => $host,
            'driver' => 'pdo_mysql',
        );

        $this->conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
    }

}
