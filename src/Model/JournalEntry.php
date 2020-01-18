<?php

namespace Hoverfly\Model;

/**
 * Class JournalEntry.
 */
class JournalEntry
{
    /**
     * @var RequestDetails
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var string
     */
    private $mode;

    /**
     * @var \DateTime
     */
    private $timeStarted;

    /**
     * @var float
     */
    private $latency;

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): JournalEntry
    {
        $this->mode = $mode;

        return $this;
    }

    public function getTimeStarted(): \DateTime
    {
        return $this->timeStarted;
    }

    public function setTimeStarted(\DateTime $timeStarted): JournalEntry
    {
        $this->timeStarted = $timeStarted;

        return $this;
    }

    public function getLatency(): float
    {
        return $this->latency;
    }

    public function setLatency(float $latency): JournalEntry
    {
        $this->latency = $latency;

        return $this;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): JournalEntry
    {
        $this->response = $response;

        return $this;
    }

    public function getRequest(): RequestDetails
    {
        return $this->request;
    }

    public function setRequest(RequestDetails $request): JournalEntry
    {
        $this->request = $request;

        return $this;
    }
}
