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
     * @var RequestFieldMatcher[]
     */
    private array $destination = [];

    /**
     * @var StubServiceBuilder
     */
    private StubServiceBuilder $serviceBuilder;

    /**
     * @var RequestFieldMatcher[]
     */
    private array $scheme = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private array $path = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private array $method = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private array $headers = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private array $query = [];

    /**
     * @var RequestFieldMatcher[]
     */
    private array $body = [];

    /**
     * @var array
     */
    private array $state = [];

    /**
     * RequestMatcherBuilder constructor.
     *
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

    public function schemeExact(string $scheme): self
    {
        return $this->scheme(RequestFieldMatcher::newExactMatcher($scheme));
    }

    public function scheme(RequestFieldMatcher ...$matchers): self
    {
        $this->scheme = $matchers;

        return $this;
    }

    public function headerExact(string $key, string $value): self
    {
        return $this->headers($key, RequestFieldMatcher::newExactMatcher($value));
    }

    public function headers(string $key, RequestFieldMatcher ...$matchers): self
    {
        $this->headers[$key] = $matchers;

        return $this;
    }

    public function queryParamExact(string $key, string $value): self
    {
        $this->query[$key] = [RequestFieldMatcher::newExactMatcher($value)];

        return $this;
    }

    public function queryParams(string $key, RequestFieldMatcher ...$matchers): self
    {
        $this->query[$key] = $matchers;

        return $this;
    }

    public function bodyExact(string $body): self
    {
        $this->body = [RequestFieldMatcher::newExactMatcher($body)];

        return $this;
    }

    public function body(RequestFieldMatcher ...$matchers): self
    {
        $this->body = $matchers;

        return $this;
    }

    public function withState(string $key, string $value): self
    {
        $this->state[$key] = $value;

        return $this;
    }

    public function willReturn(Response $response): StubServiceBuilder
    {
        $request = $this->build();
        $pair = new RequestResponsePair($request, $response);

        return $this->serviceBuilder
            ->addRequestResponsePair($pair)
            ->addDelaySettings($request, $response);
    }

    public function build(): Request
    {
        return (new Request())
            ->setMethod($this->method)
            ->setPath($this->path)
            ->setScheme($this->scheme)
            ->setHeaders($this->headers)
            ->setQuery($this->query)
            ->setBody($this->body)
            ->setRequiresState($this->state)
            ->setDestination($this->destination);
    }
}
