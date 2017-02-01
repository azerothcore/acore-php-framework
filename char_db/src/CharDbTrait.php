<?php

namespace ACore\CharDb;

trait CharDbTrait {

    protected $charDB;
    protected $charEM;

    /**
     * 
     * @return CharDb
     */
    public function getCharDb() {
        return $this->charDB;
    }

    public function setCharDb(CharDb $charDB) {
        $this->charDB = $charDB;
    }

    public function createCharEM($paths = null) {
        $this->charEM = $this->charDB->createEm($paths);
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getCharEM() {
        return $this->charEM;
    }

}
