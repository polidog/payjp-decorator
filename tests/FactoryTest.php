<?php

namespace Polidog\PayjpProxy\Tests;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\Payjp;
use Polidog\PayjpProxy\Factory;

class FactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $payjp = (new Factory())('api key');
        $this->assertInstanceOf(Payjp::class, $payjp);
    }
}
