<?php

namespace ACore\Creature;

use ACore\World\WorldDBModule;
use ACore\System\Provider;

class CreatureModule extends WorldDBModule {

    public $creatureTmplMgr;

    public function registered() {
        parent::registered();
        
        $em=$this->getWorldDB()->createEm(array(realpath(__DIR__."/Entity/")));
        $this->creatureTmplMgr = $em->getRepository(Entity\CreatureTemplate::class);
    }

    /**
     * 
     * @param \ACore\Creature\Realm $realm
     * @return CreatureModule
     */
    public static function getInstance(Provider $realm) {
        return parent::getInstance($realm);
    }

    /**
     * 
     * @return Repository\CreatureTmplMgr
     */
    public function getCreatureTmplMgr() {
        return $this->creatureTmplMgr;
    }

}
