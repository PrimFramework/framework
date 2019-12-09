<?php

/**
 * Example controller for a home page.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{

    /**
     * @var Engine
     * @var ResponseInterface
     */
    private $engine;
    private $response;


    /**
     * @param Engine $engine
     * @param ResponseInterface $response
     */
    public function __construct(Engine $engine, ResponseInterface $response)
    {
        $this->engine = $engine;
        $this->response = $response;
    }


    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $this->response->getBody()->write($this->engine->render(
            'home',
            [
                'name' => 'Kendall'
            ]
        ));
        return $this->response;
    }
}
