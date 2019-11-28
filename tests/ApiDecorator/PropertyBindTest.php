<?php

namespace Polidog\PayjpProxy\Tests\ApiDecorator;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\ApiDecorator\ApiDecoratorInterface;
use Polidog\PayjpProxy\ApiDecorator\PropertyBind;
use Prophecy\Prophecy\ObjectProphecy;

class PropertyBindTest extends TestCase
{
    /**
     * @var ApiDecoratorInterface|ObjectProphecy
     */
    private $apiDecorator;

    protected function setUp()
    {
        $this->apiDecorator = $this->prophesize(ApiDecoratorInterface::class);
    }

    public function testCall(): void
    {
        $name = 'a';
        $arguments = 'aaaa';

        $property = 'abc';
        $propertyBind = new PropertyBind($this->apiDecorator->reveal(), $property);
        $propertyBind->$name($arguments);

        ($this->apiDecorator)->__invoke($property, $name, [$arguments])
            ->shouldHaveBeenCalled();
    }
}
