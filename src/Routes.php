<?php

/**
 * Register the application's routes.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework;

use League\Container\Container;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use Prim\Framework\Middleware\AuthMiddleware;
use Prim\HttpFactory\HttpFactory;

class Routes
{

    /**
     * @param Router $router
     * @return Router
     */
    public function init(Router $router, Container $container): Router
    {

        /*
         * Example home page
         */
        $router
            ->map('GET', '/', 'Prim\Framework\Controller\HomeController::index')
            ->middleware(new AuthMiddleware)
            ->setName('home.index');


        /*
         * Example with parameter
         */
        $router
            ->map('GET', '/example/{id:number}', 'Prim\Framework\Controller\ExampleController::show')
            ->setName('example.show');


        /*
         * Example API configuration and route.
         */
        $router->group('/api/v1', function ($router) {
            $router
                ->map('GET', '/example/{id:number}', 'Prim\Framework\Controller\ExampleApiController::show')
                ->middleware(new AuthMiddleware)
                ->setName('api.example.show');

        })->setStrategy((new JsonStrategy(new HttpFactory))->setContainer($container));


        /*
         * Return the router back to the kernel.
         */
        return $router;
    }
}
