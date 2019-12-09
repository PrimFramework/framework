<?php

/**
 * Factory for returning objects implementing the PSR-7 interfaces. Also has
 * functions for returning the implementation class names.
 *
 * Currently uses Guzzle. If you want to use something else, this should be the
 * only place you have to change it.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim\Factory;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\UploadedFile;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriInterface;

class Psr7Factory
{

    /**
     * @param string $method
     * @param string|UriInterface $uri
     * @param array $headers
     * @param string|null|resource|StreamInterface $body
     * @return RequestInterface
     */
    public static function request(
        string $method,
        $uri,
        array $headers = [],
        $body = null
    ): RequestInterface {
        return new Request($method, $uri, $headers, $body, '1.1');
    }


    /**
     * @return string
     */
    public static function requestClass(): string
    {
        return Request::class;
    }


    /**
     * @return ResponseInterface
     */
    public static function response(): ResponseInterface
    {
        return new Response();
    }


    /**
     * @return string
     */
    public static function responseClass(): string
    {
        return Response::class;
    }


    /**
     * @return ServerRequestInterface
     */
    public static function serverRequest(): ServerRequestInterface
    {
        return ServerRequest::fromGlobals();
    }


    /**
     * @return string
     */
    public static function serverRequestClass(): string
    {
        return ServerRequest::class;
    }


    /**
     * @param resource $stream
     * @return StreamInterface
     */
    public static function stream($stream): StreamInterface
    {
        return new Stream($stream, []);
    }


    /**
     * @return string
     */
    public static function streamClass(): string
    {
        return Stream::class;
    }


    /**
     * @param StreamInterface|string|resource $streamOrFile
     * @param int $size
     * @param int $errorStatus
     * @param string|null $clientFilename
     * @param string|null $clientMediaType
     * @return UploadedFileInterface
     */
    public static function uploadedFile(
        $streamOrFile,
        int $size,
        int $errorStatus,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return new UploadedFile(
            $streamOrFile,
            $size,
            $errorStatus,
            $clientFilename,
            $clientMediaType
        );
    }


    /**
     * @return string
     */
    public static function uploadedFileClass(): string
    {
        return UploadedFile::class;
    }


    /**
     * @param string $uri
     * @return UriInterface
     */
    public static function uri(string $uri): UriInterface
    {
        return new Uri($uri);
    }


    /**
     * @return string
     */
    public static function uriClass(): string
    {
        return Uri::class;
    }
}
