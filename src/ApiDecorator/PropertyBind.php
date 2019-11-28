<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy\ApiDecorator;

class PropertyBind
{
    /**
     * @var ApiDecoratorInterface
     */
    private $apiDecorator;

    /**
     * @var string
     */
    private $property;

    public function __construct(ApiDecoratorInterface $apiDecorator, string $property)
    {
        $this->apiDecorator = $apiDecorator;
        $this->property = $property;
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     *
     * @throws \Polidog\PayjpProxy\Exception\PayjpProxyException
     */
    public function __call($name, $arguments)
    {
        return ($this->apiDecorator)($this->property, $name, $arguments);
    }
}
