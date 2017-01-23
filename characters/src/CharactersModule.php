<?php

namespace ACore\Characters;

use ACore\Characters\CharDBModule;
use ACore\System\Provider;

class CharactersModule extends CharDBModule {

    public $charsMgr;

    public function registered() {
        parent::registered();

        $em = $this->getCharDB()->createEm(array(realpath(__DIR__ . "/Entity/")));
        $this->charsMgr = $em->getRepository(Entity\Character::class);
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
