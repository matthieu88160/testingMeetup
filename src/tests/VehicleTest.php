<?php
namespace test\tests;

use PHPUnit\Framework\TestCase;
use test\feature\Driver;
use test\feature\Vehicle;
use PHPUnit\Framework\Constraint\Callback;

/**
 * @runTestsInSeparateProcesses
 */
class VehicleTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetDriverLicense()
    {
        $driverMock = $this->createMock(Driver::class);
        $driverMock->expects($this->any())
            ->method('getLicense')
            ->with($this->equalTo('2018-11-03 00:00:00'))
            ->willReturn('hello');

        $instance = new Vehicle();
        $result = $instance->getDriverLicense($driverMock, '2018-11-03 00:00:00');

        $this->assertEquals('hello', $result);
    }

    public function accelerateProvider()
    {
        return [
            [0, 2, 2],
            [10, 20, 30],
            [5, -2, 3]
        ];
    }

    /**
     * @dataProvider accelerateProvider
     */
    public function testAccelerate(int $speed, int $factor, int $result)
    {
        $instance = new Vehicle();
        
        $this->assertEquals($result, $instance->accelerate($speed, $factor));
    }
    
    public function testResultLowerThanZero()
    {
        $instance = new Vehicle();
        
        $this->expectException(\LogicException::class);
        $instance->accelerate(0, -1);
    }
    
    public function testOnk()
    {
        $driverReflex = new \ReflectionClass(DriverExtractor::class);
        $propertyReflex = $driverReflex->getProperty('something');
        $propertyReflex->setAccessible(true);

        $factory = new DriverExtractorFactory();
        $instance = $factory->create();

        $this->assertEquals(12, $propertyReflex->getValue($instance));

        $extractor = $driverReflex->newInstanceWithoutConstructor();
        $reflex = new \ReflectionProperty(DriverExtractor::class, 'somethingElse');
        $reflex->setAccessible(true);
        $reflex->setValue($instance, 42);
    }
}











