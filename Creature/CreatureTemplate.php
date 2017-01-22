<?php

namespace ACore\Creature;

use ACore\System\Module;
use ACore\World\WorldDBProvider;
use ACore\Realm\Realm;

class CreatureTemplate extends Module implements WorldDBProvider {

    use \ACore\World\WorldDBTrait;

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

        $conn = $this->getWorldDB()->getConn();

        $result = $conn->query("SELECT * FROM creature_template WHERE entry = " . $_entry);

        return $result->fetch_array();
    }

}
