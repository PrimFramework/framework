<?php

/**
 * Example middleware to mock authentication.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Middleware;

use League\Route\Http\Exception\UnauthorizedException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {

        // Set this to false to demonstrate.
        $auth = true;

        // If so, use the request handler to continue to the next middleware.
        if ($auth === true) {
            return $handler->handle($request);
        }

        // Otherwise throw a 401 exception.
        throw new UnauthorizedException("Unauthorized");
    }
}
