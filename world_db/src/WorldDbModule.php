<?php

namespace ACore\World;

use ACore\WorldDb\WorldDbProvider;
use ACore\WorldDb\WorldDbTrait;
use ACore\System\Module;

abstract class WorldDbModule extends Module implements WorldDbProvider {

    use WorldDbTrait;

    public function registered($paths = null) {
        $this->createWorldEM($paths);

        parent::registered($paths);
    }

}
