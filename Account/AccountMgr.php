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
        $conn = $this->getAuthDB()->getConn();
        $_username = $conn->escape_string($username);
        $_password = $conn->escape_string($password);

        $enc_password = sha1(strtoupper($_username) . ':' . strtoupper($_password));

        $result = $conn->query(""
                . "SELECT * "
                . "FROM account "
                . "WHERE LOWER(username) = LOWER('" . $_username . "') AND sha_pass_hash = '" . $enc_password . "'");

        if ($row = $result->fetch_array()) {
            return $row;
        }

        return NULL;
    }

    public function getAccountByName($username) {
        $conn = $this->getAuthDB()->getConn();

        $_username = $conn->escape_string($username);

        $result = $conn->query(""
                . "SELECT * "
                . "FROM account "
                . "WHERE LOWER(username) = LOWER('" . $_username . "');");

        if ($row = $result->fetch_array()) {
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
