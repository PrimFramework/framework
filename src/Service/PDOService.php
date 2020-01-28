<?php

/**
 * Provides a PDO connection.
 * 
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Service;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Prim\Framework\Internal\PDO;
use Prim\Framework\Internal\Policy\SettingsInterface;

class PDOService extends AbstractServiceProvider
{

    /**
     * @var array
     */
    protected $provides = [
        \PDO::class
    ];


    /**
     * @return void
     */
    public function register(): void
    {
        $this->getContainer()
            ->add(\PDO::class, PDO::class)
            ->addArgument(SettingsInterface::class);
    }
}