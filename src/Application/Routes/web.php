<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Yoku\Ddd\Application\Controllers\HomeController;
use Yoku\Ddd\Application\Controllers\NoteController;

$routeConfig = [
    'home' => [
        'path' => '/',
        'controller' => [HomeController::class, 'index'],
    ],
    'note' => [
        'path' => '/note/new',
        'controller' => [NoteController::class, 'createNote'],
    ],
    // Add more routes here...
];

$routes = new RouteCollection();

foreach ($routeConfig as $routeName => $config) {
    $route = new Route($config['path'], [
        '_controller' => $config['controller'],
    ]);

    $routes->add($routeName, $route);
}