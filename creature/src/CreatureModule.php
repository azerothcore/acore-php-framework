<?php

namespace ACore\Creature;

use ACore\World\WorldDBModule;

class CreatureModule extends WorldDBModule {
    public $creatureTmplMgr;
    
    public function __construct() {
        $this->creatureTmplMgr = new CreatureTmplMgr($this->getWorldDB(), CreatureTemplate::class);
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
