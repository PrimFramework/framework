<?php

/**
 * Example controller to show parameters and models.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Controller;

use Prim\Framework\Internal\Policy\TemplateEngineInterface;
use Prim\Framework\Model\Example;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleController
{

    /**
     * @var TemplateEngineInterface
     * @var ResponseInterface
     */
    private $template;
    private $response;


    /**
     * @param TemplateEngineInterface $engine
     * @param ResponseInterface $response
     */
    public function __construct(
        TemplateEngineInterface $template,
        ResponseInterface $response
    ) {
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
        $this->response->getBody()->write($this->template->renderTemplate(
            'home',
            [
                'message' => $example->getMessage()
            ]
        ));
        return $this->response;
    }
}
