<?php

namespace Polidog\PayjpProxy\Tests;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\ApiDecorator\ApiDecoratorInterface;
use Polidog\PayjpProxy\ApiDecorator\PropertyBind;
use Polidog\PayjpProxy\Payjp;
use Prophecy\Prophecy\ObjectProphecy;

class PayjpTest extends TestCase
{
    /**
     * @var ApiDecoratorInterface|ObjectProphecy
     */
    private $apiDecorator;

    protected function setUp()
    {
        $this->apiDecorator = $this->prophesize(ApiDecoratorInterface::class);
    }

    public function testGet(): void
    {
        $payJp = $this->createObject();
        $property = $payJp->user;

        $this->assertInstanceOf(PropertyBind::class, $property);
    }

    /**
     * @expectedException \LogicException
     */
    public function testSet(): void
    {
        $payJp = $this->createObject();
        $payJp->a = 'b';
    }

    /**
     * @expectedException \LogicException
     */
    public function testIsset(): void
    {
        $payJp = $this->createObject();
        isset($payJp->hoge);
    }

    private function createObject(): Payjp
    {
        return new Payjp($this->apiDecorator->reveal());
    }
}
