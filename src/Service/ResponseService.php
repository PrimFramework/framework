<?php

/**
 * Provides a Response object for ResponseInterface.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Service;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Prim\Framework\Factory\HttpFactory;
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
     * Use the Response object to implement the interface.
     *
     * @return void
     */
    public function register(): void
    {
        $responseClass = HttpFactory::responseClass();
        $this->getContainer()->add(ResponseInterface::class, $responseClass);
    }
}
