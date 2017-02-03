<?php

namespace ACore\Character\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/character/", defaults = { "_prefix" = "def" })
 */
class CharacterController extends ApiController {

    /**
     * 
     * @param Request $req
     * @return \ACore\Character\Repository\CharacterRepository
     */
    public function getRepo(Request $req) {
        return parent::get("character.character_mgr")->getCharacterRepo($req->get("_prefix"));
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
