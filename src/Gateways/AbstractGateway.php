<?php

namespace litvinjuan\LaravelPayments\Gateways;

use BadMethodCallException;
use Illuminate\Support\Str;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Requests\AbstractAuthorizeRequest;
use litvinjuan\LaravelPayments\Requests\AbstractCaptureRequest;
use litvinjuan\LaravelPayments\Requests\AbstractCompleteAuthorizeRequest;
use litvinjuan\LaravelPayments\Requests\AbstractCompletePurchaseRequest;
use litvinjuan\LaravelPayments\Requests\AbstractGetPaymentRequest;
use litvinjuan\LaravelPayments\Requests\AbstractPaymentNotificationRequest;
use litvinjuan\LaravelPayments\Requests\AbstractPurchaseRequest;
use litvinjuan\LaravelPayments\Requests\AbstractRefundRequest;
use litvinjuan\LaravelPayments\Requests\AbstractRequest;
use litvinjuan\LaravelPayments\Requests\AbstractValidatePaymentRequest;
use litvinjuan\LaravelPayments\Requests\AbstractVoidRequest;

/**
 * @method AbstractPaymentNotificationRequest paymentNotification(array $parameters = array())
 * @method AbstractAuthorizeRequest authorize(array $parameters = array())
 * @method AbstractCompleteAuthorizeRequest completeAuthorize(array $parameters = array())
 * @method AbstractCaptureRequest capture(array $parameters = array())
 * @method AbstractPurchaseRequest purchase(array $parameters = array())
 * @method AbstractCompletePurchaseRequest completePurchase(array $parameters = array())
 * @method AbstractRefundRequest refund(array $parameters = array())
 * @method AbstractGetPaymentRequest getPayment(array $parameters = array())
 * @method AbstractVoidRequest void(array $parameters = array())
 * @method AbstractValidatePaymentRequest validatePayment(array $parameters = array())
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
     * @throws InvalidRequestException
     */
    protected final function createRequest(string $requestClass, array $params = null)
    {
        if (! class_exists($requestClass)) {
            throw InvalidRequestException::notFound($requestClass);
        }

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
