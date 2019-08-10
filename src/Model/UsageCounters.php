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

    /**
     * @return int
     */
    public function getCapture(): int
    {
        return $this->capture;
    }

    /**
     * @param int $capture
     *
     * @return UsageCounters
     */
    public function setCapture(int $capture): UsageCounters
    {
        $this->capture = $capture;

        return $this;
    }

    /**
     * @return int
     */
    public function getDiff(): int
    {
        return $this->diff;
    }

    /**
     * @param int $diff
     *
     * @return UsageCounters
     */
    public function setDiff(int $diff): UsageCounters
    {
        $this->diff = $diff;

        return $this;
    }

    /**
     * @return int
     */
    public function getModify(): int
    {
        return $this->modify;
    }

    /**
     * @param int $modify
     *
     * @return UsageCounters
     */
    public function setModify(int $modify): UsageCounters
    {
        $this->modify = $modify;

        return $this;
    }

    /**
     * @return int
     */
    public function getSimulate(): int
    {
        return $this->simulate;
    }

    /**
     * @param int $simulate
     *
     * @return UsageCounters
     */
    public function setSimulate(int $simulate): UsageCounters
    {
        $this->simulate = $simulate;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpy(): int
    {
        return $this->spy;
    }

    /**
     * @param int $spy
     *
     * @return UsageCounters
     */
    public function setSpy(int $spy): UsageCounters
    {
        $this->spy = $spy;

        return $this;
    }

    /**
     * @return int
     */
    public function getSynthesize(): int
    {
        return $this->synthesize;
    }

    /**
     * @param int $synthesize
     *
     * @return UsageCounters
     */
    public function setSynthesize(int $synthesize): UsageCounters
    {
        $this->synthesize = $synthesize;

        return $this;
    }
}
