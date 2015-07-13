<?php

namespace DCS\AddressComponent\PointBundle\Model;

use DCS\AddressBundle\Component\AddressComponentInterface;
use DCS\AddressBundle\Component\ComponentManagerInterface;
use DCS\AddressComponent\PointBundle\DCSAddressComponentPointEvents;
use DCS\AddressComponent\PointBundle\Event\AddressPointEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class AddressPointManager implements ComponentManagerInterface
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @inheritdoc
     */
    public function create()
    {
        $className = $this->getModelClass();
        return new $className();
    }

    /**
     * @inheritDoc
     */
    public function save(AddressComponentInterface $addressComponent)
    {
        $this->dispatcher->dispatch(DCSAddressComponentPointEvents::BEFORE_SAVE_ADDRESS, new AddressPointEvent($addressComponent));
        $this->persist($addressComponent);
    }

    /**
     * Persist entity on database
     *
     * @param AddressComponentInterface $addressComponent
     */
    protected abstract function persist(AddressComponentInterface $addressComponent);
}