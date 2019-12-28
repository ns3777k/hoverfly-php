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

    public function getCounters(): UsageCounters
    {
        return $this->counters;
    }

    public function setCounters(UsageCounters $counters): Usage
    {
        $this->counters = $counters;

        return $this;
    }
}
