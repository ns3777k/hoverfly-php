<?php

namespace Hoverfly\Model;

/**
 * Class RequestDetails.
 */
class RequestDetails
{
    /**
     * @var string
     */
    private $scheme;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $method;

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function setScheme(string $scheme): RequestDetails
    {
        $this->scheme = $scheme;

        return $this;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): RequestDetails
    {
        $this->destination = $destination;

        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): RequestDetails
    {
        $this->path = $path;

        return $this;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function setQuery(string $query): RequestDetails
    {
        $this->query = $query;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): RequestDetails
    {
        $this->body = $body;

        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): RequestDetails
    {
        $this->method = $method;

        return $this;
    }
}
