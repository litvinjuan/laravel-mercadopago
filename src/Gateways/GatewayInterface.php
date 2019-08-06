<?php

namespace litvinjuan\LaravelPayments\Gateways;

interface GatewayInterface
{

    public function __construct(array $config);

    public function purchase(): ResponseInterface;

    public function pay(): ResponseInterface;

    public function check(): ResponseInterface;

    public function refund(): ResponseInterface;

}
