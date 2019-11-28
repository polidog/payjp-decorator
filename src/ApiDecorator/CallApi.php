<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy\ApiDecorator;

use Payjp\Error\Base;
use Payjp\Payjp;
use Polidog\PayjpProxy\Exception\ApiErrorException;

class CallApi implements ApiDecoratorInterface
{
    /**
     * @var string
     */
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function __invoke(string $className, string $method, array $args)
    {
        PayJp::setApiKey($this->apiKey);

        try {
            return \call_user_func_array([$className, $method], $args);
        } catch (Base $apiError) {
            throw new ApiErrorException($className, $method, $args, $apiError);
        }
    }
}
