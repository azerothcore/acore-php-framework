<?php

namespace ACore\System;

use Symfony\Component\HttpKernel\Bundle\Bundle;

abstract class Module extends Bundle {

    protected $provider;
    protected $routes;

    public static function getInstance(Provider $provider) {
        return $provider->getModule(self::getFullName());
    }

    public static function getFullName() {
        return get_called_class();
    }

    public function registered($arg1 = null) {
        
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function setRoutes(Array $routes) {
        $this->routes = $routes;
    }

    /**
     * 
     * @return Provider
     */
    public function getProvider() {
        return $this->getProvider();
    }

    public function getRouting() {
        print_r($this->container->get('router')->getRouteCollection()->all());
    }

}
