<?php

namespace ACore\WorldDb;

trait WorldDbTrait {

    protected $worldDB;
    protected $worldEM;

    /**
     * 
     * @return WorldDb
     */
    public function getWorldDb() {
        return $this->worldDB;
    }

    public function setWorldDb(WorldDb $worldDB) {
        $this->worldDB = $worldDB;
        return $this;
    }

    public function createWorldEM($paths = null) {
        $this->worldEM = $this->worldDB->createEm($paths);
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getWorldEM() {
        return $this->worldEM;
    }

}
