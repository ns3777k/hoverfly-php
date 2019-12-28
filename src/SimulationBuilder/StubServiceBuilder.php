<?php

declare(strict_types=1);

namespace Hoverfly\SimulationBuilder;

use Hoverfly\Model\DelaySettings;
use Hoverfly\Model\Request;
use Hoverfly\Model\RequestFieldMatcher;
use Hoverfly\Model\RequestResponsePair;
use Hoverfly\Model\Response;
use InvalidArgumentException;

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
     * @var DelaySettings[]
     */
    private $delaySettings = [];

    /**
     * @param RequestFieldMatcher[] $method
     * @param RequestFieldMatcher[] $path
     */
    private function createRequestMatcher(array $method, array $path): RequestMatcherBuilder
    {
        return new RequestMatcherBuilder($this, $method, $this->destination, $path);
    }

    /**
     * StubServiceBuilder constructor.
     *
     * @param RequestFieldMatcher ...$destination
     */
    public function __construct(RequestFieldMatcher ...$destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return DelaySettings[]
     */
    public function getDelaySettings(): array
    {
        return $this->delaySettings;
    }

    public function addDelaySettings(Request $request, Response $response): self
    {
        // TODO: move it
        $toPattern = function (array $matchers) use ($request): string {
            /** @var RequestFieldMatcher[] $accepted */
            $accepted = array_filter($matchers, function (RequestFieldMatcher $matcher) {
                $matcher = $matcher->getMatcher();

                return in_array($matcher, [RequestFieldMatcher::EXACT, RequestFieldMatcher::REGEX]);
            });

            if (empty($accepted)) {
                throw new InvalidArgumentException('None of the exact/regex matcher is set.');
            }

            return $accepted[0]->getValue();
        };

        if ($response->getDelay() > 0) {
            $urlPattern = $toPattern($request->getDestination()).$toPattern($request->getPath());
            $this->delaySettings[] = new DelaySettings($urlPattern, '', $response->getDelay());
        }

        return $this;
    }

    /**
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
     */
    public function setRequestResponsePairs(array $requestResponsePairs): StubServiceBuilder
    {
        $this->requestResponsePairs = $requestResponsePairs;

        return $this;
    }

    public function getExact(string $path): RequestMatcherBuilder
    {
        return $this->get(RequestFieldMatcher::newExactMatcher($path));
    }

    /**
     * @param RequestFieldMatcher ...$matchers
     */
    public function get(RequestFieldMatcher ...$matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('GET')], $matchers);
    }

    public function postExact(string $path): RequestMatcherBuilder
    {
        return $this->post(RequestFieldMatcher::newExactMatcher($path));
    }

    /**
     * @param RequestFieldMatcher ...$matchers
     */
    public function post(RequestFieldMatcher ...$matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('POST')], $matchers);
    }

    public function putExact(string $path): RequestMatcherBuilder
    {
        return $this->put(RequestFieldMatcher::newExactMatcher($path));
    }

    /**
     * @param RequestFieldMatcher ...$matchers
     */
    public function put(RequestFieldMatcher ...$matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('PUT')], $matchers);
    }

    public function deleteExact(string $path): RequestMatcherBuilder
    {
        return $this->delete(RequestFieldMatcher::newExactMatcher($path));
    }

    /**
     * @param RequestFieldMatcher ...$matchers
     */
    public function delete(RequestFieldMatcher ...$matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([RequestFieldMatcher::newExactMatcher('DELETE')], $matchers);
    }

    public function anyMethodExact(string $path): RequestMatcherBuilder
    {
        return $this->anyMethod([RequestFieldMatcher::newExactMatcher($path)]);
    }

    /**
     * @param RequestFieldMatcher ...$matchers
     */
    public function anyMethod(RequestFieldMatcher ...$matchers): RequestMatcherBuilder
    {
        return $this->createRequestMatcher([], $matchers);
    }
}
