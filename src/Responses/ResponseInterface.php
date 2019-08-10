<?php

namespace litvinjuan\LaravelPayments\Responses;

use litvinjuan\LaravelPayments\Requests\RequestInterface;

interface ResponseInterface
{

    /**
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * @return bool
     */
    public function isSuccessful();

    /**
     * @return array
     */
    public function getData();

}
