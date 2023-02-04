<?php


namespace ShopwareRecruitmentPlugin\Subscriber;


use Shopware\Core\Checkout\Cart\Event\CartChangedEvent;
use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CardChangedSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            CartChangedEvent::class => 'cartChanged'
        ];
    }

    public function cartChanged(CartChangedEvent $event): void
    {
       //Here i shoudl implement add to que request to specific URL
    }
}
