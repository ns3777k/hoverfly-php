<?php

namespace Hoverfly\Model;

/**
 * Class Usage.
 */
class Usage
{
    /**
     * @var UsageCounters
     */
    private $counters;

    /**
     * @return UsageCounters
     */
    public function getCounters(): UsageCounters
    {
        return $this->counters;
    }

    /**
     * @param UsageCounters $counters
     *
     * @return Usage
     */
    public function setCounters(UsageCounters $counters): Usage
    {
        $this->counters = $counters;

        return $this;
    }
}
