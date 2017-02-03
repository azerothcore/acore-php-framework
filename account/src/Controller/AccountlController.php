<?php

namespace ACore\Account\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/account/", defaults = { "_prefix" = "def" })
 */
class AccountTmplController extends ApiController {

    public function getServiceName() {
        return "account.account_mgr";
    }
    
    /**
     * 
     * @param Request $req
     * @return 
     */
    public function getRepo(Request $req) {
        return parent::getRepo($req);
    }

    /**
     *
     * @Route("id/{id}", name="account_single")
     */
    public function getEntry(Request $req, $id) {
        $res = $this->getRepo($req)->findOneById($id);
        return $this->serialize($res);
    }

}
