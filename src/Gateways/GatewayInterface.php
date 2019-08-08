<?php

namespace litvinjuan\LaravelPayments\Gateways;

/**
 * Interface GatewayInterface
 * @package litvinjuan\LaravelPayments\Gateways
 *
 *  @@method RequestInterface notification(array $options = array())
 *  @@method RequestInterface authorize(array $options = array())
 *  @@method RequestInterface completeAuthorize(array $options = array())
 *  @@method RequestInterface capture(array $options = array())
 *  @@method RequestInterface purchase(array $options = array())
 *  @@method RequestInterface completePurchase(array $options = array())
 *  @@method RequestInterface refund(array $options = array())
 *  @@method RequestInterface getTransaction(array $options = array())
 *  @@method RequestInterface void(array $options = array())
 *  @@method RequestInterface createCard(array $options = array())
 *  @@method RequestInterface updateCard(array $options = array())
 *  @@method RequestInterface deleteCard(array $options = array())
 *  @@method RequestInterface validateTransaction(array $options = array())
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
