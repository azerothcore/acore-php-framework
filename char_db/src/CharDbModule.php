<?php

namespace ACore\CharDb;

use ACore\System\Module;

abstract class CharDbModule extends Module implements CharDbProvider {

    use CharDbTrait;

    public function registered($paths = null) {
        $this->createCharEM($paths);

        parent::registered($paths);
    }

}
