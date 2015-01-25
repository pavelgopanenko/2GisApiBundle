<?php

namespace DGis\Bundle\ApiBundle\Tests\DependencyInjection;

use DGis\Bundle\ApiBundle\DependencyInjection\DGisApiExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DGisApiExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadWithDefault()
    {
        $container = $this->getContainer(array(array(
            'key' => 'test'
        )));

        $this->assertTrue($container->hasDefinition('dgis_api.region'));
        $this->assertTrue($container->hasDefinition('dgis_api.catalog'));
        $this->assertTrue($container->hasDefinition('dgis_api.transport'));
        $this->assertTrue($container->hasDefinition('dgis_api.geo'));
    }

    public function testClientLoadArgument()
    {
        $container = $this->getContainer(array(array(
            'key' => 'test',
        )));

        $definition = $container->getDefinition('dgis_api.connection');

        $this->assertEquals('%dgis_api.key%', $definition->getArgument(0));
    }

    public function testClassMapperLoadArgument()
    {
        $container = $this->getContainer(array(array(
            'key' => 'test',
        )));

        $definition = $container->getDefinition('dgis_api.mapper_factory');

        $this->assertEquals('%dgis_api.class_map%', $definition->getArgument(0));
    }

    protected function getContainer(array $config = array())
    {
        $container = new ContainerBuilder();
        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());

        $loader = new DGisApiExtension();
        $loader->load($config, $container);
        $container->compile();

        return $container;
    }
}
