<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class RequestResponsePair.
 */
class RequestResponsePair implements \JsonSerializable
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * RequestResponsePair constructor.
     */
    public function __construct(Request $request = null, Response $response = null)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): RequestResponsePair
    {
        $this->request = $request;

        return $this;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): RequestResponsePair
    {
        $this->response = $response;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'request' => $this->request,
            'response' => $this->response,
        ];
    }
}
