<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class Response.
 */
class Response implements \JsonSerializable
{
    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $body;

    /**
     * @var bool
     */
    private $encodedBody = false;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var bool
     */
    private $templated = false;

    /**
     * @var array
     */
    private $transitionsState = [];

    /**
     * @var array
     */
    private $removesState = [];

    /**
     * @var int
     */
    private $delay = 0;

    public static function json(array $body, int $code = 200, string $contentType = 'application/json')
    {
        return (new static())
            ->setStatus($code)
            ->setBody(json_encode($body))
            ->addHeader('Content-Type', $contentType);
    }

    public function setDelay(int $delayMs = 0)
    {
        $this->delay = $delayMs;

        return $this;
    }

    public function getDelay(): int
    {
        return $this->delay;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function isEncodedBody(): bool
    {
        return $this->encodedBody;
    }

    public function setEncodedBody(bool $encodedBody): self
    {
        $this->encodedBody = $encodedBody;

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    public function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = [$value];

        return $this;
    }

    public function isTemplated(): bool
    {
        return $this->templated;
    }

    public function setTemplated(bool $templated): self
    {
        $this->templated = $templated;

        return $this;
    }

    public function getTransitionsState(): array
    {
        return $this->transitionsState;
    }

    public function setTransitionsState(array $transitionsState): Response
    {
        $this->transitionsState = $transitionsState;

        return $this;
    }

    public function addTransitionsState(string $key, string $value): self
    {
        $this->transitionsState[$key] = $value;

        return $this;
    }

    public function removeTransitionsState(string $key): self
    {
        unset($this->transitionsState[$key]);

        return $this;
    }

    public function getRemovesState(): array
    {
        return $this->removesState;
    }

    public function setRemovesState(array $removesState): Response
    {
        $this->removesState = $removesState;

        return $this;
    }

    public function addRemovesState(string $key): self
    {
        $this->removesState[] = $key;

        return $this;
    }

    public function removeRemovesState(string $key): self
    {
        $this->removesState = array_filter($this->removesState, function (string $state) use ($key) {
            return $state !== $key;
        });

        return $this;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'status' => $this->status,
            'body' => $this->body,
            'encodedBody' => $this->encodedBody,
            'headers' => $this->headers,
            'templated' => $this->templated,
            'transitionsState' => $this->transitionsState,
            'removesState' => $this->removesState,
        ]);
    }
}
