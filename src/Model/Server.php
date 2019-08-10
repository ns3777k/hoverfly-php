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

    /**
     * @return Cors
     */
    public function getCors(): Cors
    {
        return $this->cors;
    }

    /**
     * @param Cors $cors
     *
     * @return Server
     */
    public function setCors(Cors $cors): Server
    {
        $this->cors = $cors;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpstreamProxy(): string
    {
        return $this->upstreamProxy;
    }

    /**
     * @param string $upstreamProxy
     *
     * @return Server
     */
    public function setUpstreamProxy(string $upstreamProxy): Server
    {
        $this->upstreamProxy = $upstreamProxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     *
     * @return Server
     */
    public function setDestination(string $destination): Server
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return Middleware
     */
    public function getMiddleware(): Middleware
    {
        return $this->middleware;
    }

    /**
     * @param Middleware $middleware
     *
     * @return Server
     */
    public function setMiddleware(Middleware $middleware): Server
    {
        $this->middleware = $middleware;

        return $this;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     *
     * @return Server
     */
    public function setMode(string $mode): Server
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return Server
     */
    public function setVersion(string $version): Server
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWebServer(): bool
    {
        return $this->isWebServer;
    }

    /**
     * @param bool $isWebServer
     *
     * @return Server
     */
    public function setIsWebServer(bool $isWebServer): Server
    {
        $this->isWebServer = $isWebServer;

        return $this;
    }

    /**
     * @return Arguments
     */
    public function getArguments(): Arguments
    {
        return $this->arguments;
    }

    /**
     * @param Arguments $arguments
     *
     * @return Server
     */
    public function setArguments(Arguments $arguments): Server
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @return Usage
     */
    public function getUsage(): Usage
    {
        return $this->usage;
    }

    /**
     * @param Usage $usage
     *
     * @return Server
     */
    public function setUsage(Usage $usage): Server
    {
        $this->usage = $usage;

        return $this;
    }
}
