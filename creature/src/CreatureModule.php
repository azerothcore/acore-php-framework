<?php

namespace ACore\Creature;

use ACore\World\WorldDBModule;
use ACore\Realm\Realm;

class CreatureModule extends WorldDBModule {

    public $creatureTmplMgr;

    public function registered() {
        parent::registered();
        
        $em=$this->getWorldDB()->createEm(array(__DIR__));
        $this->creatureTmplMgr = $em->getRepository(Entity\CreatureTemplate::class);
    }

    /**
     * 
     * @param \ACore\Creature\Realm $realm
     * @return CreatureModule
     */
    public static function getInstance(Realm $realm) {
        return parent::getInstance($realm);
    }

    /**
     * 
     * @return CreatureTmplMgr
     */
    public function getCreatureTmplMgr() {
        return $this->creatureTmplMgr;
    }

}
