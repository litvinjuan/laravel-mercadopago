<?php

namespace litvinjuan\LaravelPayments\Requests;

use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\ResponseInterface;

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

    /**
     * @param Payment $payment
     * @return AbstractRequest
     */
    public function payment(Payment $payment);

}
