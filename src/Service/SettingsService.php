<?php

/**
 * Provides the settings.
 * 
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Service;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Prim\Framework\Internal\Policy\SettingsInterface;
use Prim\Framework\Internal\Settings;

class SettingsService extends AbstractServiceProvider
{

    /**
     * @var array
     */
    protected $provides = [
        SettingsInterface::class
    ];


    /**
     * @return void
     */
    public function register(): void
    {
        $this->getContainer()
            ->add(SettingsInterface::class, Settings::class);
    }
}