<?php

namespace ACore\Characters;

trait CharDBTrait {

    protected $charDB;
    protected $charEM;

    /**
     * 
     * @return CharDB
     */
    public function getCharDB() {
        return $this->charDB;
    }

    public function setCharDB(CharDB $charDB) {
        $this->charDB = $charDB;
    }

    public function createCharEM(Array $paths = array()) {
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
