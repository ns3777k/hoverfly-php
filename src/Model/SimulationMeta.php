<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class SimulationMeta.
 */
class SimulationMeta implements \JsonSerializable
{
    private string $schemaVersion = 'v5';

    private string $hoverflyVersion = '';

    private string $timeExported = '';

    public function getSchemaVersion(): string
    {
        return $this->schemaVersion;
    }

    public function setSchemaVersion(string $schemaVersion): SimulationMeta
    {
        $this->schemaVersion = $schemaVersion;

        return $this;
    }

    public function getHoverflyVersion(): string
    {
        return $this->hoverflyVersion;
    }

    public function setHoverflyVersion(string $hoverflyVersion): SimulationMeta
    {
        $this->hoverflyVersion = $hoverflyVersion;

        return $this;
    }

    public function getTimeExported(): string
    {
        return $this->timeExported;
    }

    public function setTimeExported(string $timeExported): SimulationMeta
    {
        $this->timeExported = $timeExported;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'timeExported' => $this->timeExported,
            'hoverflyVersion' => $this->hoverflyVersion,
            'schemaVersion' => $this->schemaVersion,
        ];
    }
}
