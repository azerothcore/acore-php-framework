<?php

namespace ACore\Characters;

interface CharDBProvider {

    public function getCharDB();

    public function setCharDB(CharDB $charDB);
}
