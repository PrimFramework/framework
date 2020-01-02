<?php

/**
 * Example controller to show parameters and models.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Controller;

use League\Plates\Engine;
use Prim\Framework\Model\Example;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleController
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
     * @param array $params
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request, array $params): ResponseInterface
    {
        // Instantiate the Example using the id specified in the URI.
        $example = new Example($params['id']);

        // Render the example home template using the Example object's message.
        $this->response->getBody()->write($this->engine->render(
            'home',
            [
                'message' => $example->getMessage()
            ]
        ));
        return $this->response;
    }
}
