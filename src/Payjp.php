<?php

declare(strict_types=1);

namespace Polidog\PayjpProxy;

use Payjp\Account;
use Payjp\Card;
use Payjp\Charge;
use Payjp\Customer;
use Payjp\Event;
use Payjp\Subscription;
use Payjp\Token;
use Polidog\PayjpProxy\ApiDecorator\ApiDecoratorInterface;
use Polidog\PayjpProxy\ApiDecorator\PropertyBind;

/**
 * @property Customer     $customer
 * @property Card         $card
 * @property Charge       $charge
 * @property Token        $token
 * @property Account      $account
 * @property Event        $event
 * @property Subscription $subscription
 */
class Payjp
{
    /**
     * @var ApiDecoratorInterface
     */
    private $apiDecorator;

    public function __construct(ApiDecoratorInterface $apiDecorator)
    {
        $this->apiDecorator = $apiDecorator;
    }

    public function __get(string $name)
    {
        return new PropertyBind($this->apiDecorator, $name);
    }

    public function __set(string $name, $value): void
    {
        throw new \LogicException('no supported method.');
    }

    public function __isset($name): void
    {
        throw new \LogicException('no supported method.');
    }
}
