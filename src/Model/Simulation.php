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

    /**
     * @return SimulationData
     */
    public function getData(): SimulationData
    {
        return $this->data;
    }

    /**
     * @param SimulationData $data
     *
     * @return Simulation
     */
    public function setData(SimulationData $data): Simulation
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return SimulationMeta
     */
    public function getMeta(): SimulationMeta
    {
        return $this->meta;
    }

    /**
     * @param SimulationMeta $meta
     *
     * @return Simulation
     */
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
