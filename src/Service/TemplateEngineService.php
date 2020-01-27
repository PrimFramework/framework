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
use Prim\Framework\Internal\Policy\TemplateEngineInterface;
use Prim\Framework\Internal\TemplateEngine;

class TemplateEngineService extends AbstractServiceProvider
{

    /**
     * @var array
     */
    protected $provides = [
        TemplateEngineInterface::class
    ];


    /**
     * @return void
     */
    public function register(): void
    {
        $this->getContainer()
            ->add(TemplateEngineInterface::class, TemplateEngine::class)
            ->addArgument(dirname(__DIR__) . "/View");
    }
}
