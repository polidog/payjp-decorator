<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy\ApiDecorator;

use Polidog\PayjpProxy\Exception\PayjpProxyException;

interface ApiDecoratorInterface
{
    /**
     * @return mixed
     *
     * @throws PayjpProxyException
     */
    public function __invoke(string $className, string $method, array $args);
}
