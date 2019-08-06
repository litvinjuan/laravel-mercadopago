<?php

namespace litvinjuan\LaravelPayments\Gateways;

interface ResponseInterface
{

    public function getStatus(): int;

    public function isSuccessful(): bool;

    public function isRedirect(): bool;

    public function getRedirectUrl(): string;

    public function getData(): array;

}
