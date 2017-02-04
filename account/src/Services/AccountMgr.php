<?php

namespace ACore\Account\Services;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use ACore\Account\Entity\AccountEntity;
use ACore\AuthDb\Utils\AuthDbTrait;

class AccountMgr {

    use AuthDbTrait;
    use ContainerAwareTrait;

    /**
     * 
     * @param type $alias
     * @return \ACore\Account\Repository\AccountRepository
     */
    public function getAccountRepo($alias) {
        return $this->getAuthEm($alias)->getRepository(AccountEntity::class);
    }

}
