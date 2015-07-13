<?php

namespace DCS\AddressComponent\PointBundle\Event;

use DCS\AddressComponent\PointBundle\Model\AddressPointInterface;
use Symfony\Component\EventDispatcher\Event;

class AddressPointEvent extends Event
{
    private $addressPoint;

    public function __construct(AddressPointInterface $addressPoint)
    {
        $this->addressPoint = $addressPoint;
    }

    /**
     * Get addressPoint
     *
     * @return AddressPointInterface
     */
    public function getAddressPoint()
    {
        return $this->addressPoint;
    }
}