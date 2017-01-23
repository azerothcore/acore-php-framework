<?php

namespace ACore\Realm;

use ACore\Realm\Realm;
use ACore\System\Module;
use ACore\Auth\AuthDBTrait;
use ACore\World\WorldDBTrait;
use ACore\Characters\CharDBTrait;

abstract class RealmModule extends Module implements WorldDBProvider, CharDBProvider, AuthDBProvider {

    use AuthDBTrait;
    use WorldDBTrait;
    use CharDBTrait;

    protected $realm;

    public function __construct() {
        
    }

    public static function getInstance(Realm $realm) {
        return parent::getInstance($realm);
    }

    public function registered($paths = null) {
        $this->createAuthEM($paths);
        $this->createWorldEM($paths);
        $this->createCharEM($paths);

        parent::registered($paths);
    }

    /**
     * 
     * @return Realm
     */
    public function getRealm() {
        return $this->realm;
    }

    public function setRealm(Realm $realm) {
        $this->realm = $realm;
        return $this;
    }

    /**
     * 
     * @return \ACore\Auth\AuthDB
     */
    public function getAuthDB() {
        return $this->realm->getAuthDB();
    }

    /**
     * 
     * @return \ACore\Characters\CharDB
     */
    public function getCharDB() {
        return $this->realm->getCharDB();
    }

    /**
     * 
     * @return \ACore\World\WorldDB
     */
    public function getWorldDB() {
        return $this->realm->getWorldDB();
    }

}
