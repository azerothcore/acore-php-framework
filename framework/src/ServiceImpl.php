<?php

namespace ACore\Framework;

use ACore\Service\Service;
use ACore\Service\Conf;

/**
 * Just a default, skeleton, implementation. 
 * If you don't want to extends the abstract class you can use it
 * It also includes all default modules
 */
class ServiceImpl extends Service {

    public function __construct(Conf $conf, $name = "", $environment = "prod", $debug = false) {

        $_conf = new ConfDef();

        $_conf->merge($conf);

        parent::__construct($name, $_conf, $environment, $debug);
    }

    public static function createByConf($conf, $name = "") {
        return parent::createByConf($conf, $name);
    }

}
