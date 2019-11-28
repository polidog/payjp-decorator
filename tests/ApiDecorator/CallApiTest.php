<?php

namespace Polidog\PayjpProxy\Tests\ApiDecorator;

use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\ApiDecorator\CallApi;

class CallApiTest extends TestCase
{
    public function testInvoke(): void
    {
        $dummyApiKey = 'api key';
        $callApi = new CallApi($dummyApiKey);
        $result = ($callApi)(DummyApiClass::class, 'call', ['hello']);
        $this->assertSame('call-DummyApiClass hello', $result);
    }
}

class DummyApiClass
{
    public static function call(string $a): string
    {
        return 'call-DummyApiClass '.$a;
    }
}
