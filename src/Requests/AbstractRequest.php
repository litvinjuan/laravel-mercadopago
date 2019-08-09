<?php

namespace litvinjuan\LaravelPayments\Requests;

use Exception;
use Illuminate\Support\Collection;
use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use litvinjuan\LaravelPayments\Payments\Payment;
use litvinjuan\LaravelPayments\Responses\AbstractResponse;
use litvinjuan\LaravelPayments\Responses\ResponseInterface;
use litvinjuan\LaravelPayments\Util\ParametersTrait;

abstract class AbstractRequest implements RequestInterface
{
    use ParametersTrait;

    /** @var ResponseInterface */
    protected $response;

    /** @var Payment */
    protected $payment;

    /** @var string[] */
    protected $required = [];

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
     * @return RequestInterface
     */
    public function payment(Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @param array $params
     * @return RequestInterface
     */
    public function withParameters(array $params)
    {
        // Override individual params and not the whole ParameterBag
        foreach ($params as $key => $value) {
            $this->setParameter($key, $value);
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
     * @param array $data
     * @return RequestInterface
     */
    protected function saveReceivedResponseData(array $data)
    {
        $this->payment->data['response'] = $data;
        $this->payment->save();

        return $this;
    }

    /**
     * @return bool
     */
    protected function hasReceivedResponseData(): bool
    {
        return isset($this->payment->data['response']);
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
        $missingParams = new Collection();
        foreach ($this->required as $param) {
            $value = $this->payment->data[$param];
            if (! isset($value) || is_null($value)) {
                $missingParams->add($param);
            }
        }
        if ($missingParams->isNotEmpty()) {
            throw InvalidRequestException::missingParameters($missingParams);
        }

        $this->validateZeroAmount();

        $this->validateNegativeAmount();

        return true;
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
