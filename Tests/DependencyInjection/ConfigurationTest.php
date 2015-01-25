<?php

namespace DGis\Bundle\ApiBundle\Tests\DependencyInjection;

use DGis\Bundle\ApiBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultConfig()
    {
        $config = $this->process();

        $this->assertArrayHasKey('key', $config);
        $this->assertArrayHasKey('class_map', $config);
    }

    public function testKeyConfig()
    {
        $configs = array(
            'key' => 'test-key',
        );

        $config = $this->process($configs);

        $this->assertEquals('test-key', $config['key']);
    }

    public function testClassMapConfig()
    {
        $configs = array(
            'class_map' => array(
                'Region' => '\\Test\\Region',
            ),
        );

        $config = $this->process($configs);

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
