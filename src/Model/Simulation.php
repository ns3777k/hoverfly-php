<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class Simulation.
 */
class Simulation implements \JsonSerializable
{
    /**
     * @var SimulationData
     */
    private $data;

    /**
     * @var SimulationMeta
     */
    private $meta;

    public function __construct()
    {
        $this->meta = new SimulationMeta();
        $this->data = new SimulationData();
    }

    public function getData(): SimulationData
    {
        return $this->data;
    }

    public function setData(SimulationData $data): Simulation
    {
        $this->data = $data;

        return $this;
    }

    public function getMeta(): SimulationMeta
    {
        return $this->meta;
    }

    public function setMeta(SimulationMeta $meta): Simulation
    {
        $this->meta = $meta;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'meta' => $this->meta,
            'data' => $this->data,
        ];
    }
}
