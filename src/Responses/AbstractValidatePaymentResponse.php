<?php

namespace litvinjuan\LaravelPayments\Responses;

abstract class AbstractValidatePaymentResponse extends AbstractResponse
{

    /**
     * @return string|null
     */
    public abstract function getGatewayId();

    /**
     * @return bool
     */
    public abstract function validated();

    /**
     * @return string
     */
    public abstract function getMessage();

}