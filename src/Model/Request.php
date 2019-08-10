<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class Request.
 */
class Request implements \JsonSerializable
{
    /**
     * @var RequestFieldMatcher[]
     */
    private $method = [];

    /**
     * @var ArrayRequestFieldMatcher
     */
    private $headers;

    /**
     * @var ArrayRequestFieldMatcher
     */
    private $query;

    /**
     * @var RequestFieldMatcher[]
     */
    private $destination = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $path = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $scheme = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $body = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->headers = new ArrayRequestFieldMatcher();
        $this->query = new ArrayRequestFieldMatcher();
    }

    /**
     * @return RequestFieldMatcher[]
     */
    public function getMethod(): array
    {
        return $this->method;
    }

    /**
     * @param RequestFieldMatcher[] $method
     *
     * @return Request
     */
    public function setMethod(array $method): Request
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return RequestFieldMatcher[]
     */
    public function getDestination(): array
    {
        return $this->destination;
    }

    /**
     * @param RequestFieldMatcher[] $url
     *
     * @return Request
     */
    public function setDestination(array $url): Request
    {
        $this->destination = $url;

        return $this;
    }

    /**
     * @return RequestFieldMatcher[]
     */
    public function getPath(): array
    {
        return $this->path;
    }

    /**
     * @param RequestFieldMatcher[] $path
     *
     * @return Request
     */
    public function setPath(array $path): Request
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return RequestFieldMatcher[]
     */
    public function getScheme(): array
    {
        return $this->scheme;
    }

    /**
     * @param RequestFieldMatcher[] $scheme
     *
     * @return Request
     */
    public function setScheme(array $scheme): Request
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @return ArrayRequestFieldMatcher
     */
    public function getHeaders(): ArrayRequestFieldMatcher
    {
        return $this->headers;
    }

    /**
     * @param ArrayRequestFieldMatcher $headers
     *
     * @return Request
     */
    public function setHeaders(ArrayRequestFieldMatcher $headers): Request
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return ArrayRequestFieldMatcher
     */
    public function getQuery(): ArrayRequestFieldMatcher
    {
        return $this->query;
    }

    /**
     * @param ArrayRequestFieldMatcher $query
     *
     * @return Request
     */
    public function setQuery(ArrayRequestFieldMatcher $query): Request
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return RequestFieldMatcher[]
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param RequestFieldMatcher[] $body
     *
     * @return Request
     */
    public function setBody(array $body): Request
    {
        $this->body = $body;

        return $this;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'method' => $this->method,
            'scheme' => $this->scheme,
            'destination' => $this->destination,
            'path' => $this->path,
            'headers' => $this->headers,
            'query' => $this->query,
            'body' => $this->body,
        ]);
    }
}
