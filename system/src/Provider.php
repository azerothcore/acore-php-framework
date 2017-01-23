<?php

namespace ACore\System;

use ACore\System\Module;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 *  Dependency injector/container
 */
abstract class Provider extends Kernel {

    protected $moduleList = array();

    abstract public static function createByConf($name, $conf);
    
    public function registerBundles() {
        return $this->moduleList;
    }
    
    public function registerContainerConfiguration(LoaderInterface $loader) {
        //
    }

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
