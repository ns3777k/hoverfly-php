<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class Arguments.
 */
class Arguments
{
    /**
     * @var string
     */
    private $matchingStrategy = '';

    public function getMatchingStrategy(): string
    {
        return $this->matchingStrategy;
    }

    public function setMatchingStrategy(string $matchingStrategy): Arguments
    {
        $this->matchingStrategy = $matchingStrategy;

        return $this;
    }
}
