<?php

namespace ACore\WorldDb;

use ACore\WorldDb\WorldDbProvider;
use ACore\WorldDb\WorldDbTrait;
use ACore\System\Module;
use ACore\System\Provider;

abstract class WorldDbModule extends Module implements WorldDbProvider {

    use WorldDbTrait;

    public function registered($paths = null) {
        $this->createWorldEM($paths);

        parent::registered($paths);
    }

}
