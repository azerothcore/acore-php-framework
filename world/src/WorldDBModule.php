<?php

namespace ACore\World;

use ACore\World\WorldDBProvider;
use ACore\World\WorldDBTrait;
use ACore\System\Module;

abstract class WorldDBModule extends Module implements WorldDBProvider {

    use WorldDBTrait;

    public function registered($paths = null) {
        $this->createWorldEM($paths);

        parent::registered($paths);
    }

}
