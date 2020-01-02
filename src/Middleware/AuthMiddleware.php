<?php

/**
 * Example middleware to mock authentication.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Middleware;

use Prim\Framework\Factory\HttpFactory;
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

        // Determine whether or not the user is authenticated.
        $auth = false;

        // If so, use the request handler to continue to the next middleware.
        if ($auth === true) {
            return $handler->handle($request);
        }

        // Otherwise return a 401.
        return (new HttpFactory)
            ->createResponse()
            ->withStatus(401, "Unauthorized");
    }
}
