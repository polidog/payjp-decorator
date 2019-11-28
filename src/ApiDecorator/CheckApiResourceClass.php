<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy\ApiDecorator;

class CheckApiResourceClass
{
    /**
     * @var string
     */
    private $apiResourceClassName;

    public function __construct(string $apiResourceClassName)
    {
        $this->apiResourceClassName = $apiResourceClassName;
    }

    public function __invoke(string $className): bool
    {
        foreach (class_parents($className) as $parentClassName) {
            if ($this->apiResourceClassName === $parentClassName) {
                return true;
            }
        }

        return false;
    }
}
