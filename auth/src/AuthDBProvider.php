<?php

namespace ACore\Auth;

interface AuthDBProvider {

    public function getAuthDB();

    public function setAuthDB(AuthDB $authDB);
    
    public function createAuthEM($paths = null);

    public function getAuthEM();
}
