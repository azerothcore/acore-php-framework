<?php

namespace ACore\Database;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineDB {

    protected $connectionParams;

    /**
     *
     * @var EntityManager
     */
    protected $em;

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
        $isDevMode = false;

        if ($paths == null)
            $paths = array();

        $config = Setup::createAnnotationMetadataConfiguration(
                        $paths, $isDevMode, null, null, false
        );
        $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

        $this->em = EntityManager::create($this->connectionParams, $config);

        return $this->em;
    }

    public function getEntityManager() {
        return $this->em;
    }

    /**
     * {@inheritDoc}
     */
    public function Conn() {
        return $this->em->getConnection();
    }

    /**
     * Shortcut for query
     * @param type $query
     * @return \Doctrine\DBAL\Driver\Statement
     */
    public function query($query, $params = array(), $types = array()) {
        return $this->Conn()->executeQuery($query, $params, $types);
    }

    public function getVar($query, $params = array(), $types = array()) {
        return $this->query($query, $params, $types)->fetchColumn();
    }

    public function fetchSingleObj($class, $query, $params = array(), $types = array()) {
        $res = $this->fetchAllObj($class, $query);

        if ($res)
            return $res[0];

        return $res;
    }

    public function fetchAllObj($class, $query, $params = array(), $types = array()) {
        $stmt = $this->query($query, $params, $types);

        return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
    }

}
