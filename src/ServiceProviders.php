<?php

/**
 * Register the application's service providers.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework;

use League\Container\Container;

class ServiceProviders
{

    /**
     * @param Container $container
     * @return Container
     */
    public function init(Container $container): Container
    {
        $container->addServiceProvider('Prim\Framework\Service\PDOService');
        $container->addServiceProvider('Prim\Framework\Service\ResponseService');
        $container->addServiceProvider('Prim\Framework\Service\SettingsService');
        $container->addServiceProvider('Prim\Framework\Service\TemplateEngineService');
        return $container;
    }
}
