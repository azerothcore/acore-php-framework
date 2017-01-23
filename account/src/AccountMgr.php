<?php

namespace ACore\Account;

use ACore\Auth\AuthDBModule;
use ACore\System\Provider;

class AccountMgr extends AuthDBModule {

    /**
     * Verify account and returns user info
     * 
     * @param type $username
     * @param type $password
     * @return Account
     */
    public function verifyAccount($username, $password) {
        $authDB = $this->getAuthDB();
        $_username = $authDB->escapeString($username);
        $_password = $authDB->escapeString($password);

        $enc_password = sha1(strtoupper($_username) . ':' . strtoupper($_password));

        return $authDB->getSingleObj(
                        Account::class, "SELECT * "
                        . "FROM account "
                        . "WHERE LOWER(username) = LOWER('" . $_username . "') AND sha_pass_hash = '" . $enc_password . "'");
    }

    /**
     * 
     * @param string $username
     * @return Account
     */
    public function getAccountByName($username) {
        $authDB = $this->getAuthDB();
        $_username = $authDB->escapeString($username);

        return $authDB->getSingleObj(
                        Account::class, "SELECT * "
                        . "FROM account "
                        . "WHERE LOWER(username) = LOWER('" . $_username . "');");
    }

    /**
     * 
     * @param type $username
     * @param type $ip
     * @param boolean $lock true|false
     */
    public function setAccountLock($username, $ip = '127.0.0.1', $lock = true) {
        $authDB = $this->getAuthDB();

        $_username = $authDB->escapeString($username);
        $_ip = $authDB->escapeString($ip);

        $_locked = $lock ? 1 : 0;

        $authDB->query("UPDATE account SET last_ip='$_ip' , locked = $_locked WHERE username = '" . $_username . "';");
    }

    /**
     * 
     * @param \ACore\Realmlist\RList $rList
     * @return AccountMgr
     */
    public static function getInstance(Provider $rList) {
        return parent::getInstance($rList);
    }

}
