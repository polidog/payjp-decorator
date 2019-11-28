<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy\ApiDecorator;

use Polidog\PayjpProxy\Exception\ClassNotFoundException;
use Polidog\PayjpProxy\Exception\NoApiResourceClassException;

class ClassFinder implements ApiDecoratorInterface
{
    /**
     * @var ApiDecoratorInterface
     */
    private $apiDecorator;

    /**
     * @var CheckApiResourceClass
     */
    private $checkApiResourceClass;

    public function __construct(ApiDecoratorInterface $apiDecorator, CheckApiResourceClass $checkApiResourceClass)
    {
        $this->apiDecorator = $apiDecorator;
        $this->checkApiResourceClass = $checkApiResourceClass;
    }

    public function __invoke(string $property, string $method, array $args)
    {
        $className = sprintf('\\Payjp\\%s', ucfirst($property));
        if (false === class_exists($className)) {
            throw new ClassNotFoundException('no exist class: '.$className);
        }
        if (false === ($this->checkApiResourceClass)($className)) {
            throw new NoApiResourceClassException("{$className} is no {$this->checkApiResourceClass} extends object.");
        }

        return ($this->apiDecorator)($className, $method, $args);
    }
}
