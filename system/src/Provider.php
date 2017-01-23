<?php

namespace ACore\System;

use \ACore\System\Module;

/**
 *  Dependency injector/container
 */
abstract class Provider {

    protected $moduleList = array();

    abstract public static function createByConf($name, $conf);

    public function registerModule(Module $module) {
        $name = get_class($module);
        $this->moduleList[$name] = $module;
    }

    public function registerModules(Array $modules) {
        foreach ($modules as $moduleName) {
            $this->registerModule(new $moduleName());
        }
    }

    public function getModule($className) {
        return $this->moduleList[$className];
    }

}
