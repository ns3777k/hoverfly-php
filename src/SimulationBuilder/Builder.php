<?php

declare(strict_types=1);

namespace Hoverfly\SimulationBuilder;

use Hoverfly\Model\RequestFieldMatcher;

/**
 * Class Builder.
 */
class Builder
{
    /**
     * @param string $baseUrl
     *
     * @return StubServiceBuilder
     */
    public function serviceExact(string $baseUrl): StubServiceBuilder
    {
        return $this->service(RequestFieldMatcher::newExactMatcher($baseUrl));
    }

    /**
     * @param RequestFieldMatcher ...$matchers
     *
     * @return StubServiceBuilder
     */
    public function service(RequestFieldMatcher ...$matchers): StubServiceBuilder
    {
        return new StubServiceBuilder($matchers);
    }
}
