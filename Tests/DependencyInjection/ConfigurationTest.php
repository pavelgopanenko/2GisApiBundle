<?php

namespace DGis\Bundle\ApiBundle\Tests\DependencyInjection;

use DGis\Bundle\ApiBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testApiKey()
    {
        $configs = array(
            array(
                'key' => 'test',
            ),
        );

        $config = $this->process($configs);

        $this->assertArrayHasKey('key', $config);
        $this->assertEquals('test', $config['key']);
    }

    public function testClassMap()
    {
        $configs = array(
            array(
                'key'       => 'test',
                'class_map' => array(
                    'Region' => '\\Test\\Region',
                ),
            ),
        );

        $config = $this->process($configs);

        $this->assertArrayHasKey('class_map', $config);
        $this->assertEquals('\\Test\\Region', $config['class_map']['Region']);
    }

    public function testEmptyClassMap()
    {
        $configs = array(
            array(
                'key' => 'test',
            ),
        );

        $config = $this->process($configs);

        $this->assertArrayHasKey('class_map', $config);
        $this->assertEmpty($config['class_map']);
    }

    protected function process($configs)
    {
        $processor = new Processor();

        return $processor->processConfiguration(new Configuration(), $configs);
    }
}
