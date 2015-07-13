<?php

namespace DCS\AddressComponent\PointBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dcs_address_component_point');

        $rootNode
            ->children()
                ->scalarNode('alias')
                    ->cannotBeEmpty()
                    ->defaultValue('point')
                ->end()
                ->enumNode('db_driver')
                    ->values(array('orm',''))
                    ->isRequired()
                ->end()
                ->scalarNode('model_class')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->enumNode('point_form_parent')
                    ->values(array('hidden','text'))
                    ->defaultValue('text')
                    ->cannotBeEmpty()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
