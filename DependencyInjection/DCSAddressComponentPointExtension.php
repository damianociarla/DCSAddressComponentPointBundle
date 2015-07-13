<?php

namespace DCS\AddressComponent\PointBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class DCSAddressComponentPointExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('dcs_address_component_point.alias', $config['alias']);
        $container->setParameter('dcs_address_component_point.model_class', $config['model_class']);
        $container->setParameter('dcs_address_component_point.point_form_parent', $config['point_form_parent']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load(sprintf('%s.xml', $config['db_driver']));

        $container->setAlias('dcs_address_component_point.manager.address_point', 'dcs_address_component_point.manager.address_point.default');

        $loader->load('form.xml');
        $loader->load('listener.xml');
    }
}
