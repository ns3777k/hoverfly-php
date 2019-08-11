<?php

declare(strict_types=1);

namespace Hoverfly\SimulationBuilder;

use Hoverfly\Model\Request;
use Hoverfly\Model\RequestFieldMatcher;
use Hoverfly\Model\RequestResponsePair;
use Hoverfly\Model\Response;

/**
 * Class RequestMatcherBuilder.
 */
class RequestMatcherBuilder
{
    /**
     * @var string
     */
    private const SEPARATOR = '://';

    /**
     * @var RequestFieldMatcher[]
     */
    private $destination = [];

    /**
     * @var StubServiceBuilder
     */
    private $serviceBuilder;

    /**
     * @var RequestFieldMatcher[]
     */
    private $scheme = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $path = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $method = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $headers = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $query = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private $body = [];

    /**
     * RequestMatcherBuilder constructor.
     *
     * @param StubServiceBuilder    $serviceBuilder
     * @param RequestFieldMatcher[] $method
     * @param RequestFieldMatcher[] $destination
     * @param RequestFieldMatcher[] $path
     */
    public function __construct(StubServiceBuilder $serviceBuilder, array $method, array $destination, array $path)
    {
        $this->serviceBuilder = $serviceBuilder;
        $this->destination = $destination;
        $this->path = $path;
        $this->method = $method;
    }

    /**
     * @param string $scheme
     *
     * @return RequestMatcherBuilder
     */
    public function schemeExact(string $scheme): self
    {
        $this->scheme = [RequestFieldMatcher::newExactMatcher($scheme)];

        return $this;
    }

    /**
     * @param array $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function scheme(array $matchers): self
    {
        $this->scheme = $matchers;

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return RequestMatcherBuilder
     */
    public function headerExact(string $key, string $value): self
    {
        $this->headers[$key] = [RequestFieldMatcher::newExactMatcher($value)];

        return $this;
    }

    /**
     * @param string                $key
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function headers(string $key, array $matchers): self
    {
        $this->headers[$key] = $matchers;

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return RequestMatcherBuilder
     */
    public function queryParamExact(string $key, string $value): self
    {
        $this->query[$key] = [RequestFieldMatcher::newExactMatcher($value)];

        return $this;
    }

    /**
     * @param string                $key
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function queryParams(string $key, array $matchers): self
    {
        $this->query[$key] = $matchers;

        return $this;
    }

    /**
     * @param string $body
     *
     * @return RequestMatcherBuilder
     */
    public function bodyExact(string $body): self
    {
        $this->body = [RequestFieldMatcher::newExactMatcher($body)];

        return $this;
    }

    /**
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function body(array $matchers): self
    {
        $this->body = $matchers;

        return $this;
    }

    /**
     * @param Response $response
     *
     * @return StubServiceBuilder
     */
    public function willReturn(Response $response): StubServiceBuilder
    {
        $pair = new RequestResponsePair($this->build(), $response);

        return $this->serviceBuilder
            ->addRequestResponsePair($pair);
    }

    /**
     * @return Request
     */
    public function build(): Request
    {
        return (new Request())
            ->setMethod($this->method)
            ->setPath($this->path)
            ->setScheme($this->scheme)
            ->setHeaders($this->headers)
            ->setQuery($this->query)
            ->setBody($this->body)
            ->setDestination($this->destination);
    }
}
