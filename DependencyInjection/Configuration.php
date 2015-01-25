<?php

namespace DGis\Bundle\ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('d_gis_api');

        $rootNode
            ->children()
                ->scalarNode('key')->isRequired()->end()
                ->arrayNode('class_map')
                    ->prototype('scalar')
                        ->isRequired()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
