<?php

namespace litvinjuan\LaravelPayments\Gateways;

class DummyResponse implements ResponseInterface
{

    public function getStatus(): int
    {
        // TODO: Implement getStatus() method.
    }

    public function isSuccessful(): bool
    {
        // TODO: Implement isSuccessful() method.
    }

    public function isRedirect(): bool
    {
        // TODO: Implement isRedirect() method.
    }

    public function getRedirectUrl(): string
    {
        // TODO: Implement getRedirectUrl() method.
    }

    public function getData(): array
    {
        // TODO: Implement getData() method.
    }

}
