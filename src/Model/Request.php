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
     * @var RequestFieldMatcher[][]
     */
    private $headers;

    /**
     * @var RequestFieldMatcher[][]
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
     * @var array
     */
    private $requiresState = [];

    public function setRequiresState(array $state): self
    {
        $this->requiresState = $state;

        return $this;
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
     */
    public function setScheme(array $scheme): Request
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @return RequestFieldMatcher[][]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param RequestFieldMatcher[][] $headers
     */
    public function setHeaders(array $headers): Request
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return RequestFieldMatcher[][]
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @param RequestFieldMatcher[][] $query
     */
    public function setQuery(array $query): Request
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
            'requiresState' => $this->requiresState,
        ]);
    }
}
