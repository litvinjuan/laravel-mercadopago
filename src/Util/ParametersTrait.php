<?php

namespace litvinjuan\LaravelPayments\Util;

use litvinjuan\LaravelPayments\Exceptions\InvalidRequestException;
use Symfony\Component\HttpFoundation\ParameterBag;

trait ParametersTrait
{
    /**
     * Internal storage of all of the parameters.
     *
     * @var ParameterBag
     */
    protected $parameters;

    /**
     * Set one parameter.
     *
     * @param string $key Parameter key
     * @param mixed $value Parameter value
     * @return $this
     */
    protected function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);
        return $this;
    }

    /**
     * Get one parameter.
     *
     * @return mixed A single parameter value.
     */
    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     * Get all parameters.
     *
     * @return array An associative array of parameters.
     */
    public function getParameters()
    {
        return $this->parameters->all();
    }

    /**
     * Validate the request.
     *
     * This method is called internally by gateways to avoid wasting time with an API call
     * when the request is clearly invalid.
     *
     * @param string[] $args
     * @throws InvalidRequestException
     */
    public function validate(...$args)
    {
        foreach ($args as $key) {
            $value = $this->parameters->get($key);
            if (! isset($value)) {
                throw new InvalidRequestException("The $key parameter is required");
            }
        }
    }
}
