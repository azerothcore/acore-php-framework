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
    protected $conf = array();
    protected $name;

    public function __construct($conf, $name = "", $modules = array(), $environment = "prod", $debug = false) {
        $this->conf = $conf;
        $this->name = $name;
        $this->registerModules($modules);

        parent::__construct($environment, $debug);
    }

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

        $module->registered();
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
