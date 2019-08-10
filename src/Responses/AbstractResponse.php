<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Requests\RequestInterface;

abstract class AbstractResponse implements ResponseInterface
{

    /** @var array */
    protected $data;

    /** @var RequestInterface */
    protected $request;

    /**
     * @param array $data
     */
    public final function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public final function getData(): array
    {
        return $this->data;
    }

    /**
     * @return RequestInterface
     */
    public final function getRequest()
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     */
    public final function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

}
