<?php

/**
 * Example controller to show parameters and models.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Controller;

use League\Plates\Engine as Plates;
use Prim\Framework\Model\Example;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleController
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
     * @param array $params
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request, array $params): ResponseInterface
    {
        // Instantiate the Example using the id specified in the URI.
        $example = new Example($params['id']);

        // Render the example home template using the Example object's message.
        $this->response->getBody()->write($this->template->render(
            'home',
            [
                'message' => $example->getMessage()
            ]
        ));
        return $this->response;
    }
}
