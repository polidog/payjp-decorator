<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy;

use Payjp\ApiResource;
use Polidog\PayjpProxy\ApiDecorator\CallApi;
use Polidog\PayjpProxy\ApiDecorator\CheckApiResourceClass;
use Polidog\PayjpProxy\ApiDecorator\ClassFinder;

class PayjpFactory
{
    public function __invoke(string $apiKey, string $apiResourceClassName = ApiResource::class): Payjp
    {
        return new Payjp(new ClassFinder(new CallApi($apiKey), new CheckApiResourceClass($apiResourceClassName)));
    }
}
