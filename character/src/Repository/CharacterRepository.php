<?php

namespace ACore\Character\Repository;

use \ACore\System\Repository;

class CharacterRepository extends Repository {

    public function countAccChars($accountId) {
        return $this->count(["account" => $accountId]);
    }

    /**
     * API Alias
     * 
     * @param int $guid
     * @return \ACore\Character\Entity\Character
     */
    public function findOneByGuid($guid) {
        return $this->find($guid);
    }

    /**
     * API Alias
     * 
     * @param int $accountId
     * @return array()
     */
    public function findByAccount($accountId) {
        return parent::findByAccount($accountId);
    }

    /**
     * API Alias
     * 
     * @param string $name
     * @return array()
     */
    public function findByName($name) {
        return parent::findByName($name);
    }

    /**
     * API Alias
     * 
     * @param string $name
     * @return \ACore\Character\Entity\Character
     */
    public function findOneByName($name) {
        return parent::findOneByName($name);
    }

}
