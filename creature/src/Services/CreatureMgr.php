<?php

namespace ACore\Creature\Services;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use ACore\Creature\Entity\CreatureTemplate;
use ACore\Creature\Entity\Creature;
use ACore\WorldDb\Utils\WorldDbTrait;

class CreatureMgr {

    use WorldDbTrait;
    use ContainerAwareTrait;

    /**
     * 
     * @param type $alias
     * @return \ACore\Creature\Repository\CreatureTmplRepository
     */
    public function getCreatureTmplRepo($alias) {
        return $this->getWorldEm($alias)->getRepository(CreatureTemplate::class);
    }

    /**
     * 
     * @param type $alias
     * @return \ACore\Creature\Repository\CreatureRepository
     */
    public function getCreatureRepo($alias) {
        return $this->getWorldEm($alias)->getRepository(Creature::class);
    }

}
