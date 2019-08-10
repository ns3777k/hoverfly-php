<?php

namespace Hoverfly\Model;

/**
 * Class Cors.
 */
class Cors
{
    /**
     * @var bool
     */
    private $enabled = false;

    /**
     * @var string
     */
    private $allowOrigin = '';

    /**
     * @var string
     */
    private $allowMethods = '';

    /**
     * @var string
     */
    private $allowHeaders = '';

    /**
     * @var int
     */
    private $preflightMaxAge = 0;

    /**
     * @var bool
     */
    private $allowCredentials = false;

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     *
     * @return Cors
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowOrigin()
    {
        return $this->allowOrigin;
    }

    /**
     * @param string $allowOrigin
     *
     * @return Cors
     */
    public function setAllowOrigin($allowOrigin)
    {
        $this->allowOrigin = $allowOrigin;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowMethods()
    {
        return $this->allowMethods;
    }

    /**
     * @param string $allowMethods
     *
     * @return Cors
     */
    public function setAllowMethods($allowMethods)
    {
        $this->allowMethods = $allowMethods;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowHeaders()
    {
        return $this->allowHeaders;
    }

    /**
     * @param string $allowHeaders
     *
     * @return Cors
     */
    public function setAllowHeaders($allowHeaders)
    {
        $this->allowHeaders = $allowHeaders;

        return $this;
    }

    /**
     * @return int
     */
    public function getPreflightMaxAge()
    {
        return $this->preflightMaxAge;
    }

    /**
     * @param int $preflightMaxAge
     *
     * @return Cors
     */
    public function setPreflightMaxAge($preflightMaxAge)
    {
        $this->preflightMaxAge = $preflightMaxAge;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowCredentials()
    {
        return $this->allowCredentials;
    }

    /**
     * @param bool $allowCredentials
     *
     * @return Cors
     */
    public function setAllowCredentials($allowCredentials)
    {
        $this->allowCredentials = $allowCredentials;

        return $this;
    }
}
