<?php

namespace ACore\World;

interface WorldDbProvider {

    public function getWorldDb();

    public function setWorldDb(WorldDb $worldDB);

    public function createWorldEM($paths = null);

    public function getWorldEM();
}
