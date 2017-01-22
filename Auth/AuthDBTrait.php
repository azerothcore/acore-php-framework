<?php

namespace ACore\Auth;

trait AuthDBTrait {

    protected $authDB;

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

}
