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
use League\Route\Http\Exception as HttpException;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Prim\Framework\Controller\HttpExceptionController;
use Prim\Framework\Internal\Policy\TemplateEngineInterface;
use Prim\Framework\Routes;
use Prim\Framework\ServiceProviders;
use Prim\HttpFactory\HttpFactory;
use Psr\Http\Message\ResponseInterface;

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
        $router = (new Routes)->init($router, $container);

        // Create the request.
        $request = (new HttpFactory)->createServerRequestFromGlobals();

        // Assemble and dispatch the response.
        try {
            $response = $router->dispatch($request);

        // If there's an HTTP exception, handle it.
        } catch (HttpException $exception) {
            $response = (new HttpExceptionController(
                $container->get(TemplateEngineInterface::class),
                $container->get(ResponseInterface::class),
                $exception
            ))->show($request);
        }

        // Output the response back to the requester.
        (new HttpFactory)->createEmitter()->emit($response);
    }
}
