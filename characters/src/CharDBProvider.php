<?php

namespace ACore\Characters;

interface CharDBProvider {

    public function getCharDB();

    public function setCharDB(CharDB $charDB);

    public function createCharEM($paths = null);

    public function getCharEM();
}
