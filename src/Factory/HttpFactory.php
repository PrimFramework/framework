<?php

/**
 * Factory for returning objects implementing the PSR-7 interfaces. Also has
 * functions for returning the implementation class names. This is mostly a
 * wrapper for Guzzle's HttpFactory class but with Client functions as well.
 *
 * @author Kendall Weaver <kendalltweaver@gmail.com>
 * @since 0.0.1 Initial Release
 */

declare(strict_types=1);

namespace KendallTristan\Prim\Factory;

use GuzzleHttp\Psr7\HttpFactory as Factory;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\UploadedFile;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Shuttle\Shuttle;

class HttpFactory implements
    RequestFactoryInterface,
    ResponseFactoryInterface,
    ServerRequestFactoryInterface,
    StreamFactoryInterface,
    UploadedFileFactoryInterface,
    UriFactoryInterface
{

    /**
     * @return ClientInterface
     */
    public function createClient(): ClientInterface
    {
        return new Shuttle;
    }


    /**
     * @return string
     */
    public static function clientClass(): string
    {
        return Shuttle::class;
    }


    /**
     * @param string $method
     * @param string|UriInterface $uri
     * @return RequestInterface
     */
    public function createRequest(string $method, $uri): RequestInterface {
        return (new Factory)->createRequest($method, $uri);
    }


    /**
     * @return string
     */
    public static function requestClass(): string
    {
        return Request::class;
    }


    /**
     * @param int $code
     * @param string $reasonPhrase
     * @return ResponseInterface
     */
    public function createResponse(
        int $code = 200,
        string $reasonPhrase = ''
    ): ResponseInterface {
        return (new Factory)->createResponse($code, $reasonPhrase);
    }


    /**
     * @return string
     */
    public static function responseClass(): string
    {
        return Response::class;
    }


    /**
     * @param string $method
     * @param UriInterface|string $uri
     * @param array $serverParams
     * @return ServerRequestInterface
     */
    public function createServerRequest(
        string $method,
        $uri,
        array $serverParams = []
    ): ServerRequestInterface {
        return (new Factory)->createServerRequest($method, $uri, $serverParams);
    }


    /**
     * @return ServerRequestInterface
     */
    public function createServerRequestFromGlobals(): ServerRequestInterface
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
     * @param string $content
     * @return StreamInterface
     */
    public function createStream(string $content = ''): StreamInterface
    {
        return (new Factory)->createStream($content);
    }


    /**
     * @param string $filename
     * @param string $mode
     * @return StreamInterface
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return (new Factory)->createStreamFromFile($filename, $mode);
    }


    /**
     * @param resource $resource
     * @return StreamInterface
     */
    public function createStreamFromResource($resource): StreamInterface
    {
        return (new Factory)->createStreamFromResource($resource);
    }


    /**
     * @return string
     */
    public static function streamClass(): string
    {
        return Stream::class;
    }


    /**
     * @param StreamInterface $stream
     * @param int $size
     * @param int $error
     * @param string $clientFilename
     * @param string $clientMediaType
     * @return UploadedFileInterface
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return (new Factory)->createUploadedFile(
            $stream,
            $size,
            $error,
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
    public function createUri(string $uri = ''): UriInterface
    {
        return (new Factory)->createUri($uri);
    }


    /**
     * @return string
     */
    public static function uriClass(): string
    {
        return Uri::class;
    }
}
