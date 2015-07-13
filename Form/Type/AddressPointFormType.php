<?php

namespace DCS\AddressComponent\PointBundle\Form\Type;

use DCS\AddressBundle\Component\ComponentManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressPointFormType extends AbstractType
{
    private $addressPointManager;

    function __construct(ComponentManagerInterface $addressPointManager)
    {
        $this->addressPointManager = $addressPointManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('point', 'dcs_address_component_point');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->addressPointManager->getModelClass(),
        ));
    }

    public function getName()
    {
        return 'dcs_address_component_address_point';
    }
}