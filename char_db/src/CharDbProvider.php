<?php

namespace ACore\CharDb;

interface CharDbProvider {

    public function getCharDb();

    public function setCharDb(CharDb $charDB);

    public function createCharEM($paths = null);

    public function getCharEM();
}
