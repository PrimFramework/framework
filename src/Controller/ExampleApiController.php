<?php

/**
 * Example controller to show parameters and models.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Controller;

use Prim\Framework\Model\Example;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleApiController
{

    /**
     * @var ResponseInterface
     */
    private $response;


    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }


    /**
     * @param ServerRequestInterface $request
     * @param array $params
     * @return array
     */
    public function show(ServerRequestInterface $request, array $params): array
    {
        // Instantiate the Example using the id specified in the URI.
        $example = new Example($params['id']);

        // Simply return an array.
        return [
            'id' => $example->getId(),
            'message' => $example->getMessage()
        ];
    }
}
