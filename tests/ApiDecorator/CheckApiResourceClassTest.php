<?php

namespace Polidog\PayjpProxy\Tests\ApiDecorator;

use Payjp\Account;
use Payjp\ApiResource;
use Payjp\AttachedObject;
use Payjp\Card;
use PHPUnit\Framework\TestCase;
use Polidog\PayjpProxy\ApiDecorator\CheckApiResourceClass;

class CheckApiResourceClassTest extends TestCase
{
    /**
     * @dataProvider dpClassNames
     */
    public function testInvoke(string $className, bool $expect): void
    {
        $checkClass = new CheckApiResourceClass(ApiResource::class);
        $actual = ($checkClass)($className);
        $this->assertSame($expect, $actual);
    }

    public function dpClassNames(): array
    {
        return [
            [Account::class, true],
            [AttachedObject::class, false],
            [Card::class, true],
        ];
    }
}
