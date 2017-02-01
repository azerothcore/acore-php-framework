<?php

namespace ACore\AuthDb;

trait AuthDbTrait {

    protected $authDB;
    protected $authEM;

    /**
     * 
     * @return AuthDb
     */
    public function getAuthDb() {
        return $this->authDB;
    }

    public function setAuthDb(AuthDb $authDB) {
        $this->authDB = $authDB;
        return $this;
    }

    public function createAuthEM($paths = null) {
        $this->authEM = $this->authDB->createEm($paths);
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getAuthEM() {
        return $this->authEM;
    }

}
