<?php

namespace Hoverfly\Model;

/**
 * Class UsageCounters.
 */
class UsageCounters
{
    /**
     * @var int
     */
    private $capture = 0;

    /**
     * @var int
     */
    private $diff = 0;

    /**
     * @var int
     */
    private $modify = 0;

    /**
     * @var int
     */
    private $simulate = 0;

    /**
     * @var int
     */
    private $spy = 0;

    /**
     * @var int
     */
    private $synthesize = 0;

    public function getCapture(): int
    {
        return $this->capture;
    }

    public function setCapture(int $capture): UsageCounters
    {
        $this->capture = $capture;

        return $this;
    }

    public function getDiff(): int
    {
        return $this->diff;
    }

    public function setDiff(int $diff): UsageCounters
    {
        $this->diff = $diff;

        return $this;
    }

    public function getModify(): int
    {
        return $this->modify;
    }

    public function setModify(int $modify): UsageCounters
    {
        $this->modify = $modify;

        return $this;
    }

    public function getSimulate(): int
    {
        return $this->simulate;
    }

    public function setSimulate(int $simulate): UsageCounters
    {
        $this->simulate = $simulate;

        return $this;
    }

    public function getSpy(): int
    {
        return $this->spy;
    }

    public function setSpy(int $spy): UsageCounters
    {
        $this->spy = $spy;

        return $this;
    }

    public function getSynthesize(): int
    {
        return $this->synthesize;
    }

    public function setSynthesize(int $synthesize): UsageCounters
    {
        $this->synthesize = $synthesize;

        return $this;
    }
}
