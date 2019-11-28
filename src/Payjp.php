<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy;

use Polidog\PayjpProxy\ApiDecorator\ApiDecoratorInterface;
use Polidog\PayjpProxy\ApiDecorator\PropertyBind;

class Payjp
{
    /**
     * @var ApiDecoratorInterface
     */
    private $apiDecorator;

    public function __construct(ApiDecoratorInterface $apiDecorator)
    {
        $this->apiDecorator = $apiDecorator;
    }

    public function __get(string $name)
    {
        return new PropertyBind($this->apiDecorator, $name);
    }

    public function __set(string $name, $value): void
    {
        throw new \LogicException('no supported method.');
    }

    public function __isset($name): void
    {
        throw new \LogicException('no supported method.');
    }
}
