<?php

declare(strict_types=1);

namespace Hoverfly\SimulationBuilder;

use Hoverfly\Model\RequestFieldMatcher;
use Hoverfly\Model\RequestResponsePair;

/**
 * Class StubServiceBuilder.
 */
class StubServiceBuilder
{
    /**
     * @var RequestFieldMatcher[]
     */
    private $destination;

    /**
     * @var RequestResponsePair[]
     */
    private $requestResponsePairs = [];

    /**
     * StubServiceBuilder constructor.
     *
     * @param RequestFieldMatcher[] $destination
     */
    public function __construct(array $destination)
    {
        $this->destination = $destination;
    }

    /**
     * @param RequestResponsePair $pair
     *
     * @return StubServiceBuilder
     */
    public function addRequestResponsePair(RequestResponsePair $pair): self
    {
        $this->requestResponsePairs[] = $pair;

        return $this;
    }

    /**
     * @return RequestResponsePair[]
     */
    public function getRequestResponsePairs(): array
    {
        return $this->requestResponsePairs;
    }

    /**
     * @param RequestResponsePair[] $requestResponsePairs
     *
     * @return StubServiceBuilder
     */
    public function setRequestResponsePairs(array $requestResponsePairs): StubServiceBuilder
    {
        $this->requestResponsePairs = $requestResponsePairs;

        return $this;
    }

    /**
     * @param RequestFieldMatcher[] $method
     * @param RequestFieldMatcher[] $path
     *
     * @return RequestMatcherBuilder
     */
    private function createRequestMatcher(array $method, array $path): RequestMatcherBuilder
    {
        return new RequestMatcherBuilder($this, $method, $this->destination, $path);
    }

    /**
     * @param string $path
     *
     * @return RequestMatcherBuilder
     */
    public function getExact(string $path): RequestMatcherBuilder
    {
        return $this->get([RequestFieldMatcher::newExactMatcher($path)]);
    }

    /**
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function get(array $matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('GET')], $matchers);
    }

    /**
     * @param string $path
     *
     * @return RequestMatcherBuilder
     */
    public function postExact(string $path): RequestMatcherBuilder
    {
        return $this->post([RequestFieldMatcher::newExactMatcher($path)]);
    }

    /**
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function post(array $matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('POST')], $matchers);
    }

    /**
     * @param string $path
     *
     * @return RequestMatcherBuilder
     */
    public function putExact(string $path): RequestMatcherBuilder
    {
        return $this->put([RequestFieldMatcher::newExactMatcher($path)]);
    }

    /**
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function put(array $matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('PUT')], $matchers);
    }

    /**
     * @param string $path
     *
     * @return RequestMatcherBuilder
     */
    public function deleteExact(string $path): RequestMatcherBuilder
    {
        return $this->delete([RequestFieldMatcher::newExactMatcher($path)]);
    }

    /**
     * @param RequestFieldMatcher[] $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function delete(array $matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('DELETE')], $matchers);
    }

    /**
     * @param string $path
     *
     * @return RequestMatcherBuilder
     */
    public function anyMethodExact(string $path): RequestMatcherBuilder
    {
        return $this->anyMethod([RequestFieldMatcher::newExactMatcher($path)]);
    }

    /**
     * @param array $matchers
     *
     * @return RequestMatcherBuilder
     */
    public function anyMethod(array $matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([], $matchers);
    }
}
