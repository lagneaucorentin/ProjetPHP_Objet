<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Projet\Core\Config;

use Projet\Core\Routing\Route;
use Projet\Core\Routing\RouteCollection;

class RouteCollectionFactory
{
    public static function createFromArray(array $rawRoutes): RouteCollection
    {
        $routes = new RouteCollection();

        foreach ($rawRoutes as $rawRoute) {

            $routes->add(
                new Route(
                    $rawRoute['methods'],
                    $rawRoute['path'],
                    $rawRoute['action']
                )
            );
        }

        return $routes;
    }
}
