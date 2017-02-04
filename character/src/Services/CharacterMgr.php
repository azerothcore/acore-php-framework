<?php

namespace ACore\Character\Services;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use ACore\Character\Entity\CharacterEntity;
use ACore\CharDb\Utils\CharDbTrait;

class CharacterMgr {

    use CharDbTrait;
    use ContainerAwareTrait;

    /**
     * 
     * @param type $alias
     * @return \ACore\Character\Repository\CharacterTmplRepository
     */
    public function getCharacterRepo($alias) {
        return $this->getCharEm($alias)->getRepository(CharacterEntity::class);
    }

}
