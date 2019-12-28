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
     * @var GlobalActions
     */
    private $globalActions;

    public function __construct()
    {
        $this->globalActions = new GlobalActions();
    }

    /**
     * @return RequestResponsePair[]
     */
    public function getPairs(): array
    {
        return $this->pairs;
    }

    /**
     * @param RequestResponsePair[] $pairs
     */
    public function setPairs(array $pairs): SimulationData
    {
        $this->pairs = $pairs;

        return $this;
    }

    public function addPair(RequestResponsePair $pair): SimulationData
    {
        $this->pairs[] = $pair;

        return $this;
    }

    public function getGlobalActions(): GlobalActions
    {
        return $this->globalActions;
    }

    public function setGlobalActions(GlobalActions $globalActions): SimulationData
    {
        $this->globalActions = $globalActions;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'pairs' => $this->pairs,
            'globalActions' => $this->globalActions,
        ];
    }
}
