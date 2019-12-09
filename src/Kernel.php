<?php

/**
 * Initializes the application.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim;

use KendallTristan\Prim\Factory\Psr7Factory;
use KendallTristan\Prim\Routes;
use KendallTristan\Prim\ServiceProviders;
use League\Container\Container;
use League\Container\ReflectionContainer;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

class Kernel
{

    /**
     * @return void
     */
    public static function init(): void
    {
        // Instantiate a container, set up auto-wiring, and load the services.
        $container = new Container();
        $container->delegate(new ReflectionContainer);
        ServiceProviders::init($container);

        // Instantiate a router, add the container, and load the routes.
        $strategy = (new ApplicationStrategy)->setContainer($container);
        $router   = (new Router)->setStrategy($strategy);
        Routes::init($router);

        // Create the request.
        $request = Psr7Factory::serverRequest();

        // Assemble and dispatch the response.
        try {
            $response = $router->dispatch($request);
        } catch (NotFoundException $e) {
            $response = Psr7Factory::response()->withStatus(404, "Not Found");
        }

        // Output the response back to the requester.
        (new SapiEmitter)->emit($response);
    }
}
