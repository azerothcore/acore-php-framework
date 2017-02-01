<?php

namespace ACore\AuthDb;

interface AuthDbProvider {

    public function getAuthDb();

    public function setAuthDb(AuthDb $authDB);
    
    public function createAuthEM($paths = null);

    public function getAuthEM();
}
