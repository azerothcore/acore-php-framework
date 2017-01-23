<?php

namespace ACore\Account;

use ACore\System\Entity;

class Account extends Entity {
    public $id;
    public $username;
    public $locked;
    public $email;
    
    public function getId() {
        return $this->id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function isLocked() {
        return $this->locked == 0 ? false : true;
    }
    
    public function getEmail() {
        return $this->email;
    }
}

