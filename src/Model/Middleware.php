<?php

namespace Hoverfly\Model;

/**
 * Class Middleware.
 */
class Middleware implements \JsonSerializable
{
    /**
     * @var string
     */
    private $binary = '';

    /**
     * @var string
     */
    private $script = '';

    /**
     * @var string
     */
    private $remote = '';

    public function getBinary(): string
    {
        return $this->binary;
    }

    public function setBinary(string $binary): Middleware
    {
        $this->binary = $binary;

        return $this;
    }

    public function getScript(): string
    {
        return $this->script;
    }

    public function setScript(string $script): Middleware
    {
        $this->script = $script;

        return $this;
    }

    public function getRemote(): string
    {
        return $this->remote;
    }

    public function setRemote(string $remote): Middleware
    {
        $this->remote = $remote;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'binary' => $this->binary,
            'script' => $this->script,
            'remote' => $this->remote,
        ];
    }
}
