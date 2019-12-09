<?php

/**
 * Register the application's service providers.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim;

use League\Container\Container;

class ServiceProviders
{

    /**
     * @param Container $container
     * @return void
     */
    public static function init(Container $container): void
    {
        $container->addServiceProvider('KendallTristan\Prim\Service\EngineService');
        $container->addServiceProvider('KendallTristan\Prim\Service\ResponseService');
    }
}
