<?php

namespace ACore\Creature\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/creature/template/", defaults = { "_prefix" = "def" })
 */
class CreatureTmplController extends ApiController {

    /**
     * 
     * @param Request $req
     * @return \ACore\Creature\Repository\CreatureTmplRepository
     */
    public function getRepo(Request $req) {
        return parent::get("creature.creature_mgr")->getCharacterRepo($req->get("_prefix"));
    }

    /**
     *
     * @Route("entry/{entry}", name="creature_template_single")
     */
    public function getEntry(Request $req, $entry) {
        $res = $this->getRepo($req)->findOneByEntry($entry);
        return $this->serialize($res);
    }

}
