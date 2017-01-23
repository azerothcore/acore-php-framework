<?php

namespace ACore\Auth;

trait AuthDBTrait {

    protected $authDB;
    protected $authEM;

    /**
     * 
     * @return AuthDB
     */
    public function getAuthDB() {
        return $this->authDB;
    }

    public function setAuthDB(AuthDB $authDB) {
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
