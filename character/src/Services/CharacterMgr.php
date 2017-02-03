<?php

namespace ACore\Character\Services;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use ACore\Character\Entity\CharacterTemplate;
use ACore\Character\Entity\Character;
use ACore\CharDb\Utils\WorldDbTrait;

class CharacterMgr {

    use WorldDbTrait;
    use ContainerAwareTrait;

    /**
     * 
     * @param type $alias
     * @return \ACore\Character\Repository\CharacterTmplRepository
     */
    public function getCharacterRepo($alias) {
        return $this->getCharEm($alias)->getRepository(CharacterTemplate::class);
    }


    public function getCharacterSoap($alias) {
        
    }

}
