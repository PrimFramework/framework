<?php

/**
 * Provides the Plates template engine.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim\Service;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Plates\Engine;

class EngineService extends AbstractServiceProvider
{

    /**
     * @var array
     */
    protected $provides = [
        Engine::class
    ];


    /**
     * @return void
     */
    public function register(): void
    {
        $this->getContainer()
            ->add(Engine::class)
            ->addArgument(dirname(__DIR__) . "/View");
    }
}
