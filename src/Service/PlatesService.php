<?php

/**
 * Provides the Plates template engine.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Service;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Plates\Engine as Plates;

class PlatesService extends AbstractServiceProvider
{

    /**
     * @var array
     */
    protected $provides = [
        Plates::class
    ];


    /**
     * @return void
     */
    public function register(): void
    {
        $this->getContainer()
            ->add(Plates::class)
            ->addArgument(dirname(__DIR__) . "/View");
    }
}
