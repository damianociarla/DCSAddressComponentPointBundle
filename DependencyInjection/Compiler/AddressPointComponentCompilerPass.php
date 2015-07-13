<?php

namespace DCS\AddressComponent\PointBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class AddressPointComponentCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('dcs_address.component.chain')) {
            throw new \Exception('You must load the DCSAddressBundle before load this bundle');
        }

        $componentChain = $container->getDefinition('dcs_address.component.chain');

        $componentChain->addMethodCall(
            'addComponent',
            array(
                $container->getParameter('dcs_address_component_point.alias'),
                new Reference('dcs_address_component_point.manager.address_point'),
                'dcs_address_component_address_point'
            )
        );
    }
}