<?php

namespace ACore\Auth;

trait AuthDBTrait {

    protected $authDB;

    public function getAuthDB() {
        return $this->authDB;
    }

    public function setAuthDB(AuthDB $authDB) {
        $this->authDB = $authDB;
    }

}
