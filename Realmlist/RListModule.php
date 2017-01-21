<?php

namespace ACore\Realmlist;

use ACore\Realmlist\RList;
use ACore\System\Module;

abstract class RListModule extends Module {

    protected $rList;

    public function __construct() {
        
    }
    

    public static function getInstance(RList $rList) {
        return $rList->getModule(self::getName());
    }

    public function getRList() {
        return $this->rList;
    }

    public function setRList(RList $rList) {
        $this->rList = $rList;
        return $this;
    }

    /**
     * 
     * @return \ACore\Auth\AuthDB
     */
    public function getAuthDB() {
        return $this->rList->getAuthDB();
    }
}
