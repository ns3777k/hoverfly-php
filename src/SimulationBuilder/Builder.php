<?php

declare(strict_types=1);

namespace Hoverfly\SimulationBuilder;

use Hoverfly\Model\RequestFieldMatcher;

/**
 * Class Builder.
 */
class Builder
{
    public function serviceExact(string $baseUrl): StubServiceBuilder
    {
        return $this->service(RequestFieldMatcher::newExactMatcher($baseUrl));
    }

    public function service(RequestFieldMatcher ...$matchers): StubServiceBuilder
    {
        return new StubServiceBuilder(...$matchers);
    }
}
