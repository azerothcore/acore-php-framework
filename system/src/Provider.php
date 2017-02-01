<?php

namespace ACore\System;

use ACore\System\Module;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

/**
 *  Dependency injector/container
 */
abstract class Provider extends Kernel {

    protected $moduleList = array();
    protected $conf = array();
    protected $name;
    protected $routeCollection;

    public function __construct($name = "", $modules = array(), $conf = null, $environment = "prod", $debug = false) {
        $this->conf = $conf;
        $this->name = $name;

        $this->routeCollection = new RouteCollection();

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

    public function registerModule($module) {
        $name = get_class($module);
        $this->moduleList[$name] = $module;

        if ($module instanceof Module)
            $module->registered($this);
    }

    public function registerModules(Array $modules) {
        foreach ($modules as $moduleName) {
            $this->registerModule(new $moduleName());
        }
    }

    /**
     * 
     * @return RouteCollection
     */
    public function getRouteCollection() {
        return $this->routeCollection;
    }

    /**
     * 
     * @param type $className
     * @return \ACore\System\Module
     */
    public function getModule($className) {
        return $this->moduleList[$className];
    }

    public function getAllModules() {
        return $this->moduleList;
    }

    /**
     *
     * @Route("/{module}/{route}")
     */
    public function getRoute($module, $route) {
        $nameConverter = new CamelCaseToSnakeCaseNameConverter();

        $name = ucfirst($nameConverter->denormalize($module)); // under_score -> to snakeCase -> to CamelCase

        $fullName = "ACore\\" . $name . "\\" . $name . "Module";

        return $this->getModule($fullName)->getRouting();
    }

}
