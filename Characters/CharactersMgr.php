<?php

namespace ACore\Characters;

use \ACore\Realm\RealmModule;
use \ACore\Realmlist\RList;

class CharactersMgr extends CharDBModule {

    public function countCharacters($user_id) {
        $conn = $this->getCharDB()->getConn();
        $_user_id = intval($user_id);

        $result = $conn->query("SELECT COUNT(name) FROM characters WHERE account = ".$_user_id);

        if ($row = $result->fetch_array()) {
            return $row[0];
        }

        return NULL;
    }
    

    /**
     * 
     * @param \ACore\Realmlist\RList $rList
     * @return CharactersMgr
     */
    public static function getInstance(Realm $realm) {
        return parent::getInstance($realm);
    }

}
