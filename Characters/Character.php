<?php

namespace ACore\Characters;

use ACore\System\Entity;

class Character extends Entity {

    public $guid;
    public $account;
    public $name;

    public function getGuid() {
        return $this->guid;
    }

    public function getAccount() {
        return $this->account;
    }

    public function getName() {
        return $this->name;
    }

}
