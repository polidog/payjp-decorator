<?php

namespace Polidog\PayjpProxy\Tests\ApiDecorator;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\ApiDecorator\ApiDecoratorInterface;
use Polidog\PayjpProxy\ApiDecorator\CheckApiResourceClass;
use Polidog\PayjpProxy\ApiDecorator\ClassFinder;
use Prophecy\Prophecy\ObjectProphecy;

class ClassFinderTest extends TestCase
{
    /**
     * @var ApiDecoratorInterface|ObjectProphecy
     */
    private $apiDecorator;

    /**
     * @var CheckApiResourceClass|ObjectProphecy
     */
    private $checkApiResourceClass;

    protected function setUp()
    {
        $this->apiDecorator = $this->prophesize(ApiDecoratorInterface::class);
        $this->checkApiResourceClass = $this->prophesize(CheckApiResourceClass::class);
    }

    public function testInvoke(): void
    {
        $property = 'Card';
        $method = 'create';
        $className = "\\Payjp\\$property";
        $data = [
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => '02',
                'exp_year' => '2020',
            ],
            'amount' => 3500,
            'currency' => 'jpy',
        ];
        $this->checkApiResourceClass->__invoke($className)
            ->willReturn(true);
        $methodProxy = new ClassFinder($this->apiDecorator->reveal(), $this->checkApiResourceClass->reveal());
        $methodProxy->__invoke($property, $method, $data);

        $this->apiDecorator->__invoke("\\Payjp\\$property", $method, $data)
            ->shouldHaveBeenCalledTimes(1);
        $this->checkApiResourceClass->__invoke($className)
            ->shouldHaveBeenCalledTimes(1);
    }
}
