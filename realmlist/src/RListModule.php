<?php

namespace ACore\Realmlist;

use ACore\Realmlist\RList;
use ACore\System\Module;
use ACore\System\Provider;
use ACore\Auth\AuthDBProvider;
use ACore\Auth\AuthDBTrait;

abstract class RListModule extends Module implements AuthDBProvider {

    use AuthDBTrait;

    protected $rList;

    public static function getInstance(Provider $rList) {
        return parent::getInstance($rList);
    }

    public function registered($paths = null) {
        $this->createAuthEM($paths);

        parent::registered($paths);
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
