<?php

namespace DCS\AddressComponent\PointBundle\Form\Type;

use DCS\AddressComponent\PointBundle\Form\DataTransformer\TextToPointTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PointFormType extends AbstractType
{
    private $parentType;

    public function __construct($parentType)
    {
        $this->parentType = $parentType;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addViewTransformer(new TextToPointTransformer(), true);
    }

    public function getParent()
    {
        return $this->parentType;
    }

    public function getName()
    {
        return 'dcs_address_component_point';
    }
}