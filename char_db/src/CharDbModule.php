<?php

namespace ACore\CharDb;

use ACore\System\Module;
use ACore\System\Provider;

abstract class CharDbModule extends Module implements CharDbProvider {

    use CharDbTrait;

    public function registered($paths = null) {
        $this->createCharEM($paths);

        parent::registered($paths);
    }

}
