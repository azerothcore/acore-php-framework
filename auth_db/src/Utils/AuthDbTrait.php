<?php

namespace ACore\AuthDb\Utils;

use ACore\Database\Services\DoctrineDbMgr;

trait AuthDBTrait {

    /**
     *
     * @var DoctrineDbMgr 
     */
    protected $authDb;
    protected $authEm;

    /**
     * 
     * @return DoctrineDbMgr
     */
    public function getAuthDB() {
        return $this->authDB;
    }

    public function setAuthDb(DoctrineDbMgr $authDb) {
        $this->authDb = $authDb;
        $this->authDb->configureEntities(array(realpath(__DIR__ . "/../Entity/")));
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getAuthEm($alias) {
        return $this->authDb->getEm($alias, "auth");
    }

}
