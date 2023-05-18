<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Yoku\Ddd\Application\Controllers\NoteController;

$route = [
    'home' => new Route('/', ['_controller' => function(){
        return new \Symfony\Component\HttpFoundation\Response("<h1>Welcome to webo</h1>");
    }]),
    'note' => new Route('note/{id}',
        ['_controller'=> [new NoteController(), 'index']])
];

$routes = new RouteCollection();

foreach ($route as $_rn => $_route){
    $routes->add($_rn, $_route);
}
