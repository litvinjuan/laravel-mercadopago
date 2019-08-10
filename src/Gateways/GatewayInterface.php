<?php

namespace litvinjuan\LaravelPayments\Gateways;

use litvinjuan\LaravelPayments\Requests\RequestInterface;

/**
 * @method RequestInterface paymentNotification(array $parameters = array())
 * @method RequestInterface authorize(array $parameters = array())
 * @method RequestInterface completeAuthorize(array $parameters = array())
 * @method RequestInterface capture(array $parameters = array())
 * @method RequestInterface purchase(array $parameters = array())
 * @method RequestInterface completePurchase(array $parameters = array())
 * @method RequestInterface refund(array $parameters = array())
 * @method RequestInterface getPayment(array $parameters = array())
 * @method RequestInterface void(array $parameters = array())
 * @method RequestInterface validatePayment(array $parameters = array())
 *
 * @method bool supportsPaymentNotification(array $parameters = array())
 * @method bool supportsAuthorize(array $parameters = array())
 * @method bool supportsCompleteAuthorize(array $parameters = array())
 * @method bool supportsCapture(array $parameters = array())
 * @method bool supportsPurchase(array $parameters = array())
 * @method bool supportsCompletePurchase(array $parameters = array())
 * @method bool supportsRefund(array $parameters = array())
 * @method bool supportsGetPayment(array $parameters = array())
 * @method bool supportsVoid(array $parameters = array())
 * @method bool supportsValidatePayment(array $parameters = array())
 */
interface GatewayInterface
{

    /**
     * Gateway name that can be displayed to users
     * @return string
     */
    public function getName(): string;

    /**
     * Short name, can be used as an alias to create a gateway instance
     * @return string
     */
    public function getShortName(): string;

    /**
     * Get the gateway's default parameters
     * @return array
     */
    public function getDefaultParameters();

}
