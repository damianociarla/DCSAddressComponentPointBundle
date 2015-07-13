<?php

namespace DCS\AddressComponent\PointBundle\EventListener;

use DCS\AddressBundle\DCSAddressEvents;
use DCS\AddressBundle\Event\FormattedAddressEvent;
use DCS\AddressComponent\PointBundle\Model\AddressPointInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DCSAddressEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            DCSAddressEvents::TWIG_FORMATTED_ADDRESS => 'formatAddress',
        );
    }

    public function formatAddress(FormattedAddressEvent $event)
    {
        $addressComponent = $event->getAddress()->getComponent();

        if (!$addressComponent instanceof AddressPointInterface) {
            return;
        }

        $event->setFormattedAddress($addressComponent->getPoint());
    }
}