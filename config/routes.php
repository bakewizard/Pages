<?php

declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    return function (RouteBuilder $routes) {
        $routes->setRouteClass(DashedRoute::class);

        $routes->scope('/', ['controller' => 'Pages'], function (RouteBuilder $builder) {
            $builder->connect('/', ['action' => 'index']);
            $builder->connect('/{alias}', ['action' => 'show'])
                    ->setPatterns(['alias' => '[a-z0-9-]+'])
                    ->setPass(['alias']);
        });
    };
};
