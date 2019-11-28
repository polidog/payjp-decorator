<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy\Exception;

use Payjp\Error\Base;

class ApiErrorException extends \RuntimeException implements PayjpProxyException
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $args;

    /**
     * ApiErrorException constructor.
     *
     * @param string $className
     * @param string $method
     */
    public function __construct($className, $method, array $args, Base $previous)
    {
        $this->className = $className;
        $this->method = $method;
        $this->args = $args;
        parent::__construct($previous->getMessage(), $previous->getCode(), $previous);
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getArgs(): array
    {
        return $this->args;
    }
}
