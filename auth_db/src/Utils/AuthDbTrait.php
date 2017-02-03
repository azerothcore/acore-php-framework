<?php

namespace ACore\AuthDb\Utils;

use ACore\Database\Services\DoctrineDbMgr;

trait AuthDbTrait {

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
    public function getAuthDb() {
        return $this->authDb;
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
