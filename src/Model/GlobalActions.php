<?php

namespace Hoverfly\Model;

/**
 * Class GlobalActions.
 */
class GlobalActions implements \JsonSerializable
{
    /**
     * @var DelaySettings[]
     */
    private $delays = [];

    /**
     * @return DelaySettings[]
     */
    public function getDelaySettings(): array
    {
        return $this->delays;
    }

    /**
     * @param DelaySettings[] $delays
     */
    public function setDelaySettings(array $delays): GlobalActions
    {
        $this->delays = $delays;

        return $this;
    }

    public function addDelaySettings(DelaySettings $delaySettings): GlobalActions
    {
        $this->delays[] = $delaySettings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'delays' => $this->delays,
        ];
    }
}
