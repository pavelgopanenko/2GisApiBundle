<?php

namespace DGis\Bundle\ApiBundle\Tests\DependencyInjection;

use DGis\Bundle\ApiBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultConfig()
    {
        $configs = array(
            'key' => 'test-key',
        );

        $config = $this->process($configs);

        $this->assertArrayHasKey('key', $config);
        $this->assertEquals('test-key', $config['key']);
        $this->assertEmpty($config['class_map']);
    }

    public function testClassMapConfig()
    {
        $configs = array(
            'class_map' => array(
                'Region' => '\\Test\\Region',
            ),
        );

        $config = $this->process($configs);

        $this->assertArrayHasKey('class_map', $config);
        $this->assertEquals('\\Test\\Region', $config['class_map']['Region']);
    }

    protected function process(array $configs = array())
    {
        if (empty($configs['key'])) {
            $configs['key'] = 'test';
        }
        $processor = new Processor();

        return $processor->processConfiguration(new Configuration(), array($configs));
    }
}
