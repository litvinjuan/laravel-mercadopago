<?php

namespace litvinjuan\LaravelPayments\Gateways;

use BadMethodCallException;
use Illuminate\Support\Str;
use litvinjuan\LaravelPayments\Requests\AbstractRequest;
use litvinjuan\LaravelPayments\Requests\RequestInterface;
use litvinjuan\LaravelPayments\Util\GatewayShortNameGenerator;

/**
 * @method RequestInterface notification(array $options = array())
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface purchase(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface getTransaction(array $options = array())
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface validateTransaction(array $options = array())
 *
 * @method bool supportsNotification(array $options = array())
 * @method bool supportsAuthorize(array $options = array())
 * @method bool supportsCompleteAuthorize(array $options = array())
 * @method bool supportsCapture(array $options = array())
 * @method bool supportsPurchase(array $options = array())
 * @method bool supportsCompletePurchase(array $options = array())
 * @method bool supportsRefund(array $options = array())
 * @method bool supportsGetTransaction(array $options = array())
 * @method bool supportsVoid(array $options = array())
 * @method bool supportsValidateTransaction(array $options = array())
 */
abstract class AbstractGateway implements GatewayInterface
{

    /**
     * Gateway name that can be displayed to users
     *
     * @return string
     */
    public abstract function getName(): string;

    /**
     * Short name, can be used as an alias to create a gateway instance
     *
     * @return string
     */
    public final function getShortName(): string
    {
        return GatewayShortNameGenerator::generate($this);
    }

    /**
     * Get the gateway's default parameters
     *
     * @return array
     */
    public abstract function getDefaultParameters();

    /**
     * Create a request with the provided params
     *
     * @param string $requestClass
     * @param array|null $params
     * @return AbstractRequest
     */
    protected final function createRequest(string $requestClass, array $params = null) {
        /** @var AbstractRequest $request */
        $request = (new $requestClass());
        $request->withParameters($params ?? $this->getDefaultParameters());

        return $request;
    }

    /**
     * Manage 'supports' magic method calls
     *
     * @param $method
     * @param $args
     * @return bool
     */
    public function __call($method, $args)
    {
        if (! Str::startsWith($method, 'supports')) {
            throw new BadMethodCallException("Method [$method] does not exist.");
        }

        $methodName = Str::camel(Str::substr($method, 8));
        return method_exists($this, $methodName);
    }
}
