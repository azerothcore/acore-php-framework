<?php

namespace ACore\Realmlist;

use ACore\Realmlist\RList;
use ACore\System\Module;
use ACore\System\Provider;
use ACore\AuthDb\AuthDbProvider;
use ACore\AuthDb\AuthDbTrait;

abstract class RListModule extends Module implements AuthDbProvider {

    use AuthDbTrait;

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
     * @return \ACore\AuthDb\AuthDb
     */
    public function getAuthDb() {
        return $this->rList->getAuthDb();
    }

}
