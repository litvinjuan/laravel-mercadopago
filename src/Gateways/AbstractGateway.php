<?php

namespace litvinjuan\LaravelPayments\Gateways;

use ShortNameGenerator;

/**
 * @method AbstractRequest notification(array $options = array())
 * @method AbstractRequest authorize(array $options = array())
 * @method AbstractRequest completeAuthorize(array $options = array())
 * @method AbstractRequest capture(array $options = array())
 * @method AbstractRequest purchase(array $options = array())
 * @method AbstractRequest completePurchase(array $options = array())
 * @method AbstractRequest refund(array $options = array())
 * @method AbstractRequest getTransaction(array $options = array())
 * @method AbstractRequest void(array $options = array())
 * @method AbstractRequest createCard(array $options = array())
 * @method AbstractRequest updateCard(array $options = array())
 * @method AbstractRequest deleteCard(array $options = array())
 * @method AbstractRequest validateTransaction(array $options = array())
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
    public function getShortName(): string
    {
        return ShortNameGenerator::generate($this);
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
     * @return AbstractRequest
     */
    protected function createRequest(string $requestClass) {
        /** @var AbstractRequest $request */
        $request = (new $requestClass());
        $request->withParameters($this->getDefaultParameters());

        return $request;
    }

    /**
     * Gateway supports notification operation
     *
     * @return bool
     */
    public function supportsNotification(): bool
    {
        return method_exists($this, 'notification');
    }

    /**
     * Gateway supports authorize operation
     *
     * @return bool
     */
    public function supportsAuthorize(): bool
    {
        return method_exists($this, 'authorize');
    }

    /**
     * Gateway supports completeAuthorize operation
     *
     * @return bool
     */
    public function supportsCompleteAuthorize(): bool
    {
        return method_exists($this, 'completeAuthorize');
    }

    /**
     * Gateway supports capture operation
     *
     * @return bool
     */
    public function supportsCapture(): bool
    {
        return method_exists($this, 'capture');
    }

    /**
     * Gateway supports purchase operation
     *
     * @return bool
     */
    public function supportsPurchase(): bool
    {
        return method_exists($this, 'purchase');
    }

    /**
     * Gateway supports completePurchase operation
     *
     * @return bool
     */
    public function supportsCompletePurchase(): bool
    {
        return method_exists($this, 'completePurchase');
    }

    /**
     * Gateway supports refund operation
     *
     * @return bool
     */
    public function supportsRefund(): bool
    {
        return method_exists($this, 'refund');
    }

    /**
     * Gateway supports getTransaction operation
     *
     * @return bool
     */
    public function supportsGetTransaction(): bool
    {
        return method_exists($this, 'getTransaction');
    }

    /**
     * Gateway supports void operation
     *
     * @return bool
     */
    public function supportsVoid(): bool
    {
        return method_exists($this, 'void');
    }

    /**
     * Gateway supports createCard operation
     *
     * @return bool
     */
    public function supportsCreateCard(): bool
    {
        return method_exists($this, 'createCard');
    }

    /**
     * Gateway supports updateCard operation
     *
     * @return bool
     */
    public function supportsUpdateCard(): bool
    {
        return method_exists($this, 'updateCard');
    }

    /**
     * Gateway supports deleteCard operation
     *
     * @return bool
     */
    public function supportsDeleteCard(): bool
    {
        return method_exists($this, 'deleteCard');
    }

    /**
     * Gateway supports validateTransaction operation
     *
     * @return bool
     */
    public function supportsValidateTransaction(): bool
    {
        return method_exists($this, 'validateTransaction');
    }
}
