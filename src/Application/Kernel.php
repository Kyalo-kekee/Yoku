<?php

namespace Yoku\Ddd\Application;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Yoku\Ddd\Application\Routes\Routing;

class Kernel
{
    public function run()
    {
        require  __DIR__.'/Config/services.php';
        // Create a new request object
        $request = Request::createFromGlobals();

        // Load the routes
        $routes = new RouteCollection();


        require __DIR__.'/Routes/web.php';
        //require __DIR__.'/Routes/api.php';


        // Create a new request context and URL matcher
        $context = new RequestContext('/');
        $matcher = new UrlMatcher($routes, $context);

        // Create the URL matcher
        $matcher = new UrlMatcher($routes, new RequestContext());

        // Create the event dispatcher
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));

        // Create the controller and argument resolvers
        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();

        // Create the HTTP kernel
        $kernel = new HttpKernel($dispatcher, $controllerResolver, new RequestStack(), $argumentResolver);

        // Handle the request
        $response = $kernel->handle($request);
        $response->send();

        // Terminate the kernel
        $kernel->terminate($request, $response);
    }
}