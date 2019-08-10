<?php

namespace Hoverfly\Model;

/**
 * Class Middleware.
 */
class Middleware
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

    /**
     * @return string
     */
    public function getBinary(): string
    {
        return $this->binary;
    }

    /**
     * @param string $binary
     *
     * @return Middleware
     */
    public function setBinary(string $binary): Middleware
    {
        $this->binary = $binary;

        return $this;
    }

    /**
     * @return string
     */
    public function getScript(): string
    {
        return $this->script;
    }

    /**
     * @param string $script
     *
     * @return Middleware
     */
    public function setScript(string $script): Middleware
    {
        $this->script = $script;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemote(): string
    {
        return $this->remote;
    }

    /**
     * @param string $remote
     *
     * @return Middleware
     */
    public function setRemote(string $remote): Middleware
    {
        $this->remote = $remote;

        return $this;
    }
}
