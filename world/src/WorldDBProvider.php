<?php

namespace ACore\World;

interface WorldDBProvider {

    public function getWorldDB();

    public function setWorldDB(WorldDB $worldDB);

    public function createWorldEM($paths = null);

    public function getWorldEM();
}
