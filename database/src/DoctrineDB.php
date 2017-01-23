<?php

namespace ACore\Database;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

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

    /**
     * 
     * @param type $paths
     * @return EntityManager
     */
    public function createEm($paths = array()) {
        $isDevMode = true;

        if ($paths == null)
            $paths = array();

        $config = Setup::createAnnotationMetadataConfiguration(
                        $paths, $isDevMode, null, null, false
        );
        $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

        return EntityManager::create($this->connectionParams, $config);
    }

}
