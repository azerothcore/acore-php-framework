<?php

namespace ACore\Character\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/character/", defaults = { "_prefix" = "def" })
 */
class CharacterTmplController extends ApiController {

    public function getServiceName() {
        return "character.character_mgr";
    }

    /**
     *
     * @Route("guid/{guid}", name="character_single")
     */
    public function getEntry(Request $req, $guid) {
        $res = $this->getRepo($req)->findOneByGuid($guid);
        return $this->serialize($res);
    }

}
