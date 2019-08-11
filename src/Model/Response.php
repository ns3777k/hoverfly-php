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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return Response
     */
    public function setStatus(int $status): Response
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return Response
     */
    public function setBody(string $body): Response
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEncodedBody(): bool
    {
        return $this->encodedBody;
    }

    /**
     * @param bool $encodedBody
     *
     * @return Response
     */
    public function setEncodedBody(bool $encodedBody): Response
    {
        $this->encodedBody = $encodedBody;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     *
     * @return Response
     */
    public function setHeaders(array $headers): Response
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return Response
     */
    public function addHeader(string $key, string $value): Response
    {
        $this->headers[$key] = [$value];

        return $this;
    }

    /**
     * @return bool
     */
    public function isTemplated(): bool
    {
        return $this->templated;
    }

    /**
     * @param bool $templated
     *
     * @return Response
     */
    public function setTemplated(bool $templated): Response
    {
        $this->templated = $templated;

        return $this;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'status' => $this->status,
            'body' => $this->body,
            'encodedBody' => $this->encodedBody,
            'headers' => $this->headers,
            'templated' => $this->templated,
        ]);
    }
}
