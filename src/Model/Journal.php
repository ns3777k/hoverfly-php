<?php

namespace Hoverfly\Model;

/**
 * Class Journal.
 */
class Journal
{
    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @var int
     */
    private $limit = 0;

    /**
     * @var int
     */
    private $total = 0;

    /**
     * @var JournalEntry[]
     */
    private $journal = [];

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): Journal
    {
        $this->offset = $offset;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): Journal
    {
        $this->limit = $limit;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): Journal
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return JournalEntry[]
     */
    public function getJournal(): array
    {
        return $this->journal;
    }

    /**
     * @param JournalEntry[] $journal
     */
    public function setJournal(array $journal): Journal
    {
        $this->journal = $journal;

        return $this;
    }
}
