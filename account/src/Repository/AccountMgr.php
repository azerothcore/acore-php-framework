<?php

namespace ACore\Account\Repository;

class AccountMgr extends \Doctrine\ORM\EntityRepository {

    /**
     * Verify account and returns user info
     * 
     * @param type $username
     * @param type $password
     * @return Account
     */
    public function verifyAccount($username, $password) {
        $authDB = $this->getEntityManager();

        $enc_password = sha1(strtoupper($username) . ':' . strtoupper($password));

        return $authDB->createQueryBuilder("SELECT * "
                                . "FROM account "
                                . "WHERE LOWER(username) = LOWER(:username) AND sha_pass_hash = :password")
                        ->setParameter("username", $_username)
                        ->setParameter("password", $enc_password)->getQuery()->getResult();
    }

    /**
     * 
     * @param type $username
     * @param type $ip
     * @param boolean $lock true|false
     */
    public function setAccountLock($username, $ip = '127.0.0.1', $lock = true) {
        $authDB = $this->getEntityManager();

        $authDB->createQueryBuilder()
                ->update("account")
                ->set("last_ip", $ip)
                ->set("locked", $lock)
                ->where('username = :username')
                ->setParameter("username", $username);
    }

}
