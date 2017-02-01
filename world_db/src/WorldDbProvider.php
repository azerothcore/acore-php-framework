<?php

namespace ACore\WorldDb;

interface WorldDbProvider {

    public function getWorldDb();

    public function setWorldDb(WorldDb $worldDB);

    public function createWorldEM($paths = null);

    public function getWorldEM();
}
