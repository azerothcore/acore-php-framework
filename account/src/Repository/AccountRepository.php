<?php

namespace ACore\Account\Repository;

use \ACore\System\Utils\Repository;

class AccountRepository extends Repository {

    /**
     * Verify account and returns user info
     * 
     * @param type $username
     * @param type $password
     * @return Account
     */
    public function verifyAccount($username, $password) {
        $authDb = $this->getEM();

        $enc_password = sha1(strtoupper($username) . ':' . strtoupper($password));

        return $authDb->createQueryBuilder("SELECT * "
                                . "FROM account "
                                . "WHERE LOWER(username) = LOWER(:username) AND sha_pass_hash = :password")
                        ->setParameter("username", $username)
                        ->setParameter("password", $enc_password)->getQuery()->getResult();
    }

    /**
     * 
     * @param type $username
     * @param type $ip
     * @param boolean $lock true|false
     */
    public function setAccountLock($username, $ip = '127.0.0.1', $lock = true) {
        $authDb = $this->getEntityManager();

        $authDb->createQueryBuilder()
                ->update("account")
                ->set("last_ip", $ip)
                ->set("locked", $lock)
                ->where('username = :username')
                ->setParameter("username", $username);
    }

    /**
     * API Alias
     * 
     * @param string $username
     * @return \ACore\Account\Entity\Account
     */
    public function findOneByUsername($username) {
        return parent::findOneByUsername($username);
    }

    /**
     * API Alias
     * 
     * @param int $id
     * @return \ACore\Account\Entity\Account
     */
    public function findOneById($id) {
        return $this->find($id);
    }

}
