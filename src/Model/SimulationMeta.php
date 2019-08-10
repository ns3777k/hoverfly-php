<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class SimulationMeta.
 */
class SimulationMeta implements \JsonSerializable
{
    /**
     * @var string
     */
    private $schemaVersion = 'v5';

    /**
     * @var string
     */
    private $hoverflyVersion = '';

    /**
     * @var string
     */
    private $timeExported = '';

    /**
     * @return string
     */
    public function getSchemaVersion(): string
    {
        return $this->schemaVersion;
    }

    /**
     * @param string $schemaVersion
     *
     * @return SimulationMeta
     */
    public function setSchemaVersion(string $schemaVersion): SimulationMeta
    {
        $this->schemaVersion = $schemaVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getHoverflyVersion(): string
    {
        return $this->hoverflyVersion;
    }

    /**
     * @param string $hoverflyVersion
     *
     * @return SimulationMeta
     */
    public function setHoverflyVersion(string $hoverflyVersion): SimulationMeta
    {
        $this->hoverflyVersion = $hoverflyVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeExported(): string
    {
        return $this->timeExported;
    }

    /**
     * @param string $timeExported
     *
     * @return SimulationMeta
     */
    public function setTimeExported(string $timeExported): SimulationMeta
    {
        $this->timeExported = $timeExported;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'timeExported' => $this->timeExported,
            'hoverflyVersion' => $this->hoverflyVersion,
            'schemaVersion' => $this->schemaVersion,
        ];
    }
}
