<?php

/**
 * Controller for handling HTTP exceptions.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace Prim\Framework\Controller;

use League\Route\Http\Exception as HttpException;
use Prim\Framework\Internal\Policy\SettingsInterface;
use Prim\Framework\Internal\Policy\TemplateEngineInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HttpExceptionController
{

    /**
     * @var TemplateEngineInterface
     * @var ResponseInterface
     * @var SettingsInterface
     * @var Exception
     */
    protected $template;
    protected $response;
    protected $settings;
    protected $exception;


    /**
     * @param TemplateEngineInterface $engine
     * @param ResponseInterface $response
     * @param SettingsInterface $settings
     * @param HttpException $exception
     */
    public function __construct(
        TemplateEngineInterface $template,
        ResponseInterface $response,
        SettingsInterface $settings,
        HttpException $exception
    ) {
        $this->template = $template;
        $this->response = $response;
        $this->settings = $settings;
        $this->exception = $exception;
    }


    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request): ResponseInterface
    {
        // Determine if we're using an error specific template file.
        $directory = $this->settings->get('path.views') . '/HttpError';
        $status = $this->exception->getStatusCode();
        if (file_exists("{$directory}/{$status}.php")) {
            $templateFile = "HttpError/{$status}";
        } else {
            $templateFile = 'HttpError/default';
        }

        // Render the template file using the HttpException.
        $this->response->getBody()->write($this->template->renderTemplate(
            $templateFile,
            [
                'error' => $this->exception->getStatusCode(),
                'message' => $this->exception->getMessage()
            ]
        ));
        return $this->response;
    }
}