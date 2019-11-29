<?php

namespace Polidog\PayjpProxy\Tests;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\Factory;
use Polidog\PayjpProxy\Payjp;

class FactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $payjp = (new Factory())('api key');
        $this->assertInstanceOf(Payjp::class, $payjp);
    }
}
