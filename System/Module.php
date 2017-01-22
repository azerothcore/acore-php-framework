<?php

namespace ACore\System;

abstract class Module {

    public static function getInstance(Provider $provider) {
        return $provider->getModule(self::getName());
    }

    public static function getName() {
        return get_called_class();
    }

}
