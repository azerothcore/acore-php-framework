<?php

namespace ACore\Account;

use \ACore\Realmlist\RListModule;
use \ACore\Realmlist\RList;

class AccountMgr extends RListModule {

    /**
     * Verify account and returns user info
     * 
     * @param type $username
     * @param type $password
     * @return Array || NULL
     */
    public function verifyAccount($username, $password) {
        $result = $this->getAuthDB()->getAccountWithPass($username, $password);

        if ($row = mysqli_fetch_array($result)) {
            return $row;
        }

        return NULL;
    }

    public function getAccountByName($username) {
        $result = $this->getAuthDB()->getAccountInfoByName($username);

        if ($row = mysqli_fetch_array($result)) {
            return $row;
        }

        return NULL;
    }

    /**
     * 
     * @param \ACore\Realmlist\RList $rList
     * @return AccountMgr
     */
    public static function getInstance(RList $rList) {
        return parent::getInstance($rList);
    }

}
