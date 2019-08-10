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
     *
     * @param Request|null  $request
     * @param Response|null $response
     */
    public function __construct(Request $request = null, Response $response = null)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     *
     * @return RequestResponsePair
     */
    public function setRequest(Request $request): RequestResponsePair
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     *
     * @return RequestResponsePair
     */
    public function setResponse(Response $response): RequestResponsePair
    {
        $this->response = $response;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'request' => $this->request,
            'response' => $this->response,
        ];
    }
}
