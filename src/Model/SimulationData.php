<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class SimulationData.
 */
class SimulationData implements \JsonSerializable
{
    /**
     * @var RequestResponsePair[]
     */
    private $pairs = [];

    /**
     * @return RequestResponsePair[]
     */
    public function getPairs(): array
    {
        return $this->pairs;
    }

    /**
     * @param RequestResponsePair[] $pairs
     *
     * @return SimulationData
     */
    public function setPairs(array $pairs): SimulationData
    {
        $this->pairs = $pairs;

        return $this;
    }

    /**
     * @param RequestResponsePair $pair
     *
     * @return SimulationData
     */
    public function addPair(RequestResponsePair $pair): SimulationData
    {
        $this->pairs[] = $pair;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'pairs' => $this->pairs,
        ];
    }
}
