<?php

namespace ACore\World;

trait WorldDBTrait {

    protected $worldDB;
    protected $worldEM;

    /**
     * 
     * @return WorldDB
     */
    public function getWorldDB() {
        return $this->worldDB;
    }

    public function setWorldDB(WorldDB $worldDB) {
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
