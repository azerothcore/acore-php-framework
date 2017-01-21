<?php

namespace ACore\System;

abstract class Module {
    public static function getName() {
        return get_called_class();
    }
}
