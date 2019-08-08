<?php

namespace litvinjuan\LaravelPayments\Gateways;

abstract class AbstractResponse implements ResponseInterface
{

    /** @var array */
    protected $data;

    public function getRequest(): RequestInterface
    {
        // TODO: Implement getRequest() method.
    }

    public function isSuccessful(): bool
    {
        // TODO: Implement isSuccessful() method.
    }

    public function isRedirect(): bool
    {
        // TODO: Implement isRedirect() method.
    }

    public function isCancelled(): bool
    {
        // TODO: Implement isCancelled() method.
    }

    public function getMessage(): ?string
    {
        // TODO: Implement getMessage() method.
    }

    public function getCode(): ?int
    {
        // TODO: Implement getCode() method.
    }

    public function getTransactionReference(): ?string
    {
        // TODO: Implement getTransactionReference() method.
    }

    public function getData(): array
    {
        $this->data;
    }

}
