<?php

namespace ACore\System;

use Symfony\Component\HttpKernel\Bundle\Bundle;

abstract class Module extends Bundle {

    public static function getInstance(Provider $provider) {
        return $provider->getModule(self::getFullName());
    }

    public static function getFullName() {
        return get_called_class();
    }
    
    public function registered() {}

}
