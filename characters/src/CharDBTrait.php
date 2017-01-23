<?php

namespace ACore\Characters;

trait CharDBTrait {

    protected $charDB;

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

}
