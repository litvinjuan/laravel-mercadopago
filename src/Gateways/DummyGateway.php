<?php

namespace litvinjuan\LaravelPayments\Gateways;

class DummyGateway implements GatewayInterface
{

    /** @var array */
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function purchase(): ResponseInterface
    {
        return new DummyResponse();
    }

    public function pay(): ResponseInterface
    {
        return new DummyResponse();
    }

    public function check(): ResponseInterface
    {
        return new DummyResponse();
    }

    public function refund(): ResponseInterface
    {
        return new DummyResponse();
    }
}
