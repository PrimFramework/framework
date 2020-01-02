<?php

/**
 * Register the application's routes.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework;

use League\Route\Router;
use Prim\Framework\Middleware\AuthMiddleware;

class Routes
{

    /**
     * @param Router $router
     * @return Router
     */
    public function init(Router $router): Router
    {

        /*
         * Home page
         */
        $router
            ->map('GET', '/', 'Prim\Framework\Controller\HomeController::index')
            ->middleware(new AuthMiddleware);


        /*
         * Example with parameter
         */
        $router
            ->map('GET', '/example/{id}', 'Prim\Framework\Controller\ExampleController::show');


        /*
         * Return the router back to the kernel.
         */
        return $router;
    }
}
