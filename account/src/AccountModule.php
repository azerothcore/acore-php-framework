<?php

namespace ACore\Account;

use ACore\Auth\AuthDBModule;
use ACore\System\Provider;

class AccountModule extends AuthDBModule {

    public $accountMgr;

    public function registered() {
        parent::registered();

        $em = $this->getAuthDB()->createEm(array(realpath(__DIR__ . "/Entity/")));
        $this->accountMgr = $em->getRepository(Entity\Account::class);
    }

    /**
     * 
     * @param \ACore\Realmlist\RList $rList
     * @return AccountModule
     */
    public static function getInstance(Provider $rList) {
        return parent::getInstance($rList);
    }

    /**
     * 
     * @return Repository\AccountMgr
     */
    public function getAccountMgr() {
        return $this->accountMgr;
    }

}
