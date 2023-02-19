<?php

namespace Hoverfly\Model;

/**
 * Class DelaySettings.
 */
class DelaySettings implements \JsonSerializable
{
    /**
     * @var string
     */
    private $urlPattern = '.';

    /**
     * @var string
     */
    private $httpMethod = '';

    /**
     * @var int
     */
    private $delay = 0;

    public function __construct(string $urlPattern = '.', string $httpMethod = '', $delay = 0)
    {
        $this->urlPattern = $urlPattern;
        $this->httpMethod = $httpMethod;
        $this->delay = $delay;
    }

    public function getUrlPattern(): string
    {
        return $this->urlPattern;
    }

    public function setUrlPattern(string $urlPattern): DelaySettings
    {
        $this->urlPattern = $urlPattern;

        return $this;
    }

    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    public function setHttpMethod(string $httpMethod): DelaySettings
    {
        $this->httpMethod = $httpMethod;

        return $this;
    }

    public function getDelay(): int
    {
        return $this->delay;
    }

    public function setDelay(int $delay): DelaySettings
    {
        $this->delay = $delay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'httpMethod' => $this->httpMethod,
            'delay' => $this->delay,
            'urlPattern' => $this->urlPattern,
        ];
    }
}
