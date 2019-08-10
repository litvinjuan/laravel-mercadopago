<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractResponse;
use litvinjuan\LaravelPayments\Responses\ResponseInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

abstract class AbstractRequest implements RequestInterface
{

    /** @var ResponseInterface */
    protected $response;

    /** @var Payment */
    protected $payment;

    /** @var ParameterBag */
    protected $parameters;

    /** @var string[] */
    protected $requiredParameters = [];

    /** @var bool */
    protected $zeroAmountAllowed = true;

    /** @var bool */
    protected $negativeAmountAllowed = false;

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Payment $payment
     * @return AbstractRequest
     */
    public function payment(Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters->all();
    }

    /**
     * @param $key
     * @param $value
     * @return AbstractRequest
     */
    public function withParameter($key, $value)
    {
        $this->parameters->set($key, $value);
        return $this;
    }

    /**
     * @param array $params
     * @return AbstractRequest
     */
    public function withParameters(array $params)
    {
        // Override individual params and not the whole ParameterBag
        foreach ($params as $key => $value) {
            $this->withParameter($key, $value);
        }

        return $this;
    }

    /**
     * @return ResponseInterface
     * @throws InvalidRequestException
     * @throws Exception
     */
    public final function send()
    {
        // Initialize request
        $this->init();

        // Validate request before sending
        $this->validate();

        // Send request
        $response = $this->execute();

        // Save request and response inside one another
        $response->setRequest($this);
        $this->setResponse($response);

        // If response data was not set on the payment model during the request, set it manually now
        if (! $this->hasReceivedResponseData()) {
            $this->saveReceivedResponseData($response->getData());
        }

        return $response;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    protected function getParameter($key, $default = null)
    {
        return $this->parameters->get($key) ?? $this->payment->getParameter($key) ?? $default;
    }

    /**
     * @param array $data
     * @return RequestInterface
     */
    protected function saveReceivedResponseData(array $data)
    {
        $this->payment->setParameter('response', $data);
        return $this;
    }

    /**
     * @return bool
     */
    protected function hasReceivedResponseData(): bool
    {
        return !! $this->payment->getParameter('response');
    }

    /**
     * @return void
     */
    protected abstract function init();

    /**
     * @return AbstractResponse
     * @throws Exception
     */
    protected abstract function execute();

    /**
     * @return bool
     * @throws InvalidRequestException
     */
    private function validate()
    {
        // Check that a payment was set
        if (! $this->payment) {
            throw InvalidRequestException::noPayment();
        }

        // Check that this request hasn't already been sent
        if ($this->getResponse()) {
            throw InvalidRequestException::alreadySent();
        }

        // Check all required params are set.
        $this->validateParameters($this->requiredParameters);

        // Check that amount is not zero or negative if applicable
        $this->validateZeroAmount();
        $this->validateNegativeAmount();

        return true;
    }

    /**
     * @param string[] $args
     * @throws InvalidRequestException
     */
    private function validateParameters(...$args)
    {
        foreach ($args as $key) {
            $value = $this->parameters->get($key);
            if (! isset($value)) {
                throw InvalidRequestException::missingParameters($key);
            }
        }
    }

    /**
     * @return bool
     * @throws InvalidRequestException
     */
    private function validateZeroAmount()
    {
        if ($this->zeroAmountAllowed) {
            return true;
        }

        if ($this->payment->price->isZero()) {
            throw InvalidRequestException::zeroAmount();
        }

        return true;
    }

    /**
     * @return bool
     * @throws InvalidRequestException
     */
    private function validateNegativeAmount()
    {
        if ($this->negativeAmountAllowed) {
            return true;
        }

        if ($this->payment->price->isNegative()) {
            throw InvalidRequestException::zeroAmount();
        }

        return true;
    }

    private function setResponse(AbstractResponse $response)
    {
        $this->response = $response;
    }
}
