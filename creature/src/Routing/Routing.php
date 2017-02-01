<?php

// src/SomeBundle/Routing/SomeRouteCollectionProvider.php
namespace ACore\Creature\Routing;

use Symplify\ModularRouting\Routing\AbstractRouteCollectionProvider;

final class CreatureRouting extends AbstractRouteCollectionProvider
{
    /**
     * inheritdoc
     */
    public function getRouteCollection()
    {
        # routes.yml is the file, where all your routes are located
        //$routes= $this->loadRouteCollectionFromFile(__DIR__.'/routes.yml');
        
        $routeCollection = new RouteCollection();
        $routeCollection->add('my_route', new Route('/hello'));
        
        return $routeCollection;
    }
}