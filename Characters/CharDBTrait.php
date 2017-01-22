<?php

namespace ACore\Characters;

trait CharDBTrait {

    protected $charDB;

    public function getCharDB() {
        return $this->charDB;
    }

    public function setCharDB(CharDB $charDB) {
        $this->charDB = $charDB;
    }

}
