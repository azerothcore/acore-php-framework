<?php

namespace ACore\Characters;

use ACore\CharDb\CharDbModule;
use ACore\System\Provider;

class CharactersModule extends CharDbModule {

    public $charsMgr;

    public function registered($paths = null) {
        parent::registered(array(realpath(__DIR__ . "/Entity/")));

        $this->charsMgr = $this->getCharEM()->getRepository(Entity\Character::class);
    }

    /**
     * 
     * @param \ACore\Realm\Realm $realm
     * @return CharactersModule
     */
    public static function getInstance(Provider $realm) {
        return parent::getInstance($realm);
    }

    /**
     * 
     * @return Repository\CharactersMgr
     */
    public function getCharactersMgr() {
        return $this->charsMgr;
    }

}
