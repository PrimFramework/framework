<?php

/**
 * Provides a Diactoros Response object for ResponseInterface.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim\Service;

use KendallTristan\Prim\Factory\Psr7Factory;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Http\Message\ResponseInterface;

class ResponseService extends AbstractServiceProvider
{

    /**
     * @var array
     */
    protected $provides = [
        ResponseInterface::class
    ];


    /**
     * Use the Diactoros Response object to implement the interface.
     *
     * @return void
     */
    public function register(): void
    {
        $responseClass = Psr7Factory::responseClass();
        $this->getContainer()->add(ResponseInterface::class, $responseClass);
    }
}
