<?php

namespace ACore\Database;

class DoctrineDB {

    protected $connectionParams;

    public function __construct($host, $name, $user = "", $pass = "", $port = 3306, $socket = "") {
        $this->connectionParams = array(
            'dbname' => $name,
            'user' => $user,
            'password' => $pass,
            'host' => $host,
            'driver' => 'pdo_mysql',
        );
    }
    
    public function createEm($paths) {
        $isDevMode = false;

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        return \Doctrine\ORM\EntityManager::create($this->connectionParams, $config);
    }
    

}
