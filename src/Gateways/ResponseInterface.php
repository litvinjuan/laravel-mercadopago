<?php

namespace litvinjuan\LaravelPayments\Gateways;

interface ResponseInterface
{

    public function getRequest(): RequestInterface;

    public function isSuccessful(): bool;

    public function isRedirect(): bool;

    public function isCancelled(): bool;

    public function getMessage(): ?string;

    public function getCode(): ?int;

    public function getTransactionReference(): ?string;

    public function getData(): array;

}
