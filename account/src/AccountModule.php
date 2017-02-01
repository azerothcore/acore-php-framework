<?php

namespace ACore\Account;

use ACore\AuthDb\AuthDbModule;
use ACore\System\Provider;

class AccountModule extends AuthDbModule {

    public $accountMgr;

    public function registered($paths = null) {
        parent::registered(array(realpath(__DIR__ . "/Entity/")));

        $this->accountMgr = $this->getAuthEM()->getRepository(Entity\Account::class);
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
