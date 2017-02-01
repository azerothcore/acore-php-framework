<?php

namespace ACore\Realm;

use ACore\Realm\Realm;
use ACore\System\Module;
use ACore\AuthDb\AuthDbTrait;
use ACore\WorldDb\WorldDbTrait;
use ACore\CharDb\CharDbTrait;
use ACore\System\Provider;

abstract class RealmModule extends Module implements WorldDbProvider, CharDbProvider, AuthDbProvider {

    use AuthDbTrait;
    use WorldDbTrait;
    use CharDbTrait;

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
     * @return \ACore\AuthDb\AuthDb
     */
    public function getAuthDb() {
        return $this->realm->getAuthDb();
    }

    /**
     * 
     * @return \ACore\CharDb\CharDb
     */
    public function getCharDb() {
        return $this->realm->getCharDb();
    }

    /**
     * 
     * @return \ACore\WorldDb\WorldDb
     */
    public function getWorldDb() {
        return $this->realm->getWorldDb();
    }

}
