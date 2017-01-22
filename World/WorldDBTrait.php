<?php

namespace ACore\World;

trait WorldDBTrait {

    protected $worldDB;

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

}
