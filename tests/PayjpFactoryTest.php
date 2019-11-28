<?php

namespace Polidog\PayjpProxy\Tests;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\Payjp;
use Polidog\PayjpProxy\PayjpFactory;

class PayjpFactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $payjp = (new PayjpFactory())('api key');
        $this->assertInstanceOf(Payjp::class, $payjp);
    }
}
