<?php

namespace ACore\Creature;

use ACore\WorldDb\WorldDbModule;
use ACore\System\Provider;
use Symfony\Component\Routing\Route;

class CreatureModule extends WorldDbModule {

    public $creatureTmplMgr;
    public $creatureMgr;

    public function __construct() {
        $routes = array();
        $routes["creature_template"] = new Route('/creature_template', array(
            '_controller' => 'CreatureTmplCtrl',
        ));

        $this->setRoutes($routes);
    }

    public function registered($paths = null) {
        parent::registered(array(realpath(__DIR__ . "/Entity/")));

        $this->creatureTmplMgr = $this->getWorldEM()->getRepository(Entity\CreatureTemplate::class);
        $this->creatureMgr = $this->getWorldEM()->getRepository(Entity\Creature::class);
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

    /**
     * 
     * @return Repository\CreatureMgr
     */
    public function getCreatureMgr() {
        return $this->creatureMgr;
    }

}
