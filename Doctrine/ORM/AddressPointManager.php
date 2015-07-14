<?php

namespace DCS\AddressComponent\PointBundle\Doctrine\ORM;

use DCS\AddressBundle\Component\AddressComponentInterface;
use DCS\AddressBundle\Model\AddressInterface;
use DCS\AddressComponent\PointBundle\Model\AddressPointManager as BaseAddressPointManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AddressPointManager extends BaseAddressPointManager
{
    private $className;
    private $entityManager;

    function __construct($className, EntityManagerInterface $entityManager, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct($eventDispatcher);

        $this->className = $className;
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function getModelClass()
    {
        return $this->className;
    }

    /**
     * @inheritdoc
     */
    public function persist(AddressComponentInterface $addressComponent, $andFlush = true)
    {
        $this->entityManager->persist($addressComponent);

        if ($andFlush) {
            $this->entityManager->flush();
        }
    }

    /**
     * @inheritdoc
     */
    public function findOneByAddress(AddressInterface $address)
    {
        $repo = $this->entityManager->getRepository($this->className);

        return $repo->findOneBy(array(
            'address' => $address
        ));
    }
}