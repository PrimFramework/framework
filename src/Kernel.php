<?php

/**
 * Initializes the application.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework;

use League\Container\Container;
use League\Container\ReflectionContainer;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Prim\Framework\Factory\HttpFactory;
use Prim\Framework\Routes;
use Prim\Framework\ServiceProviders;

class Kernel
{

    /**
     * @return void
     */
    public function init(): void
    {
        // Instantiate a container, set up auto-wiring, and load the services.
        $container = new Container();
        $container->delegate(new ReflectionContainer);
        $container = (new ServiceProviders)->init($container);

        // Instantiate a router, add the container, and load the routes.
        $strategy = (new ApplicationStrategy)->setContainer($container);
        $router = (new Router)->setStrategy($strategy);
        $router = (new Routes)->init($router);

        // Create the request.
        $request = (new HttpFactory)->createServerRequestFromGlobals();

        // Assemble and dispatch the response.
        try {
            $response = $router->dispatch($request);
        } catch (NotFoundException $e) {
            $response = (new HttpFactory)
                ->createResponse()
                ->withStatus(404, "Not Found");
        }

        // Output the response back to the requester.
        (new HttpFactory)->createEmitter()->emit($response);
    }
}
