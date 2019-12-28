<?php

namespace Hoverfly\Model;

/**
 * Class Server.
 */
class Server
{
    /**
     * @var Cors
     */
    private $cors;

    /**
     * @var string
     */
    private $upstreamProxy = '';

    /**
     * @var Arguments
     */
    private $arguments;

    /**
     * @var string
     */
    private $destination = '';

    /**
     * @var Middleware
     */
    private $middleware;

    /**
     * @var string
     */
    private $mode = '';

    /**
     * @var string
     */
    private $version = '';

    /**
     * @var bool
     */
    private $isWebServer = false;

    /**
     * @var Usage
     */
    private $usage;

    public function getCors(): Cors
    {
        return $this->cors;
    }

    public function setCors(Cors $cors): Server
    {
        $this->cors = $cors;

        return $this;
    }

    public function getUpstreamProxy(): string
    {
        return $this->upstreamProxy;
    }

    public function setUpstreamProxy(string $upstreamProxy): Server
    {
        $this->upstreamProxy = $upstreamProxy;

        return $this;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): Server
    {
        $this->destination = $destination;

        return $this;
    }

    public function getMiddleware(): Middleware
    {
        return $this->middleware;
    }

    public function setMiddleware(Middleware $middleware): Server
    {
        $this->middleware = $middleware;

        return $this;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): Server
    {
        $this->mode = $mode;

        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): Server
    {
        $this->version = $version;

        return $this;
    }

    public function isWebServer(): bool
    {
        return $this->isWebServer;
    }

    public function setIsWebServer(bool $isWebServer): Server
    {
        $this->isWebServer = $isWebServer;

        return $this;
    }

    public function getArguments(): Arguments
    {
        return $this->arguments;
    }

    public function setArguments(Arguments $arguments): Server
    {
        $this->arguments = $arguments;

        return $this;
    }

    public function getUsage(): Usage
    {
        return $this->usage;
    }

    public function setUsage(Usage $usage): Server
    {
        $this->usage = $usage;

        return $this;
    }
}
