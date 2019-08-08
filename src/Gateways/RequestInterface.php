<?php

namespace litvinjuan\LaravelPayments\Gateways;

interface RequestInterface
{

    /**
     * @return ResponseInterface
     */
    public function getResponse();

    /**
     * @return ResponseInterface
     */
    public function send();

}
