<?php

namespace ACore\AuthDb;

use ACore\AuthDb\AuthDbProvider;
use ACore\AuthDb\AuthDbTrait;
use ACore\System\Module;

abstract class AuthDbModule extends Module implements AuthDbProvider {

    use AuthDbTrait;

    public function registered($paths = null) {
        $this->createAuthEM($paths);

        parent::registered($paths);
    }

}
