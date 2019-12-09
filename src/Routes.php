<?php

/**
 * Register the application's routes.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim;

use League\Route\Router;
use KendallTristan\Prim\Middleware\AuthMiddleware;

class Routes
{

    /**
     * @param Router $router
     * @return void
     */
    public static function init(Router $router): void
    {

        /*
         * Home page
         */
        $router
            ->map('GET', '/', 'KendallTristan\Prim\Controller\HomeController::index')
            ->middleware(new AuthMiddleware);
    }
}
