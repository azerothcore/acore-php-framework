<?php

namespace ACore\Characters;

use ACore\System\Provider;

class CharactersMgr extends CharDBModule {

    public function countCharacters($user_id) {
        $_user_id = intval($user_id);

        return $this->getCharDB()->getVar("SELECT COUNT(name) FROM characters WHERE account = " . $_user_id);
    }

    public function getCharacterByGuid($guid) {
        $_guid = intval($guid);

        return $this->getCharDB()->getSingleObj(Character::class, "SELECT * "
                        . "FROM characters "
                        . "WHERE guid = " . $_guid);
    }

    public function getCharsByAccId($accountId) {
        $_accountId = intval($accountId);

        return $this->getCharDB()->getAllObjects(Character::class, "SELECT * "
                        . "FROM characters "
                        . "WHERE account = " . $_accountId);
    }

    /**
     * 
     * @param \ACore\Realm\Realm $realm
     * @return CharactersMgr
     */
    public static function getInstance(Provider $realm) {
        return parent::getInstance($realm);
    }

}
