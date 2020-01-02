<?php

/**
 * Example controller for a home page.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Controller;

use League\Plates\Engine as Plates;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{

    /**
     * @var Plates
     * @var ResponseInterface
     */
    private $template;
    private $response;


    /**
     * @param Plates $engine
     * @param ResponseInterface $response
     */
    public function __construct(Plates $template, ResponseInterface $response)
    {
        $this->template = $template;
        $this->response = $response;
    }


    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $this->response->getBody()->write($this->template->render(
            'home',
            [
                'message' => 'Welcome to Prim!'
            ]
        ));
        return $this->response;
    }
}
