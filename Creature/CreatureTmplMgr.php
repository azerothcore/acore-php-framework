<?php

namespace ACore\Creature;

use \ACore\World\WorldDBModule;
use ACore\Realm\Realm;

class CreatureTmplMgr extends WorldDBModule {

    /**
     * 
     * @param \ACore\Creature\Realm $realm
     * @return CreatureTemplate
     */
    public static function getInstance(Realm $realm) {
        return parent::getInstance($realm);
    }

    public function getCreatureByEntry($entry) {
        $_entry = intval($entry);

        return $this->getWorldDB()->getSingleObj(
                CreatureTemplate::class, "SELECT * "
                . "FROM creature_template "
                . "WHERE entry = " . $_entry
        );
    }

}
