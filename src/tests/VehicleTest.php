<?php
namespace test\tests;

use PHPUnit\Framework\TestCase;
use test\feature\Vehicle;
use PHPUnit\Framework\Constraint\Callback;

class VehicleTest extends TestCase
{    
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
        $instance = new Vehicle();
        
        $this->assertThat($instance->onk(), new Callback(function($value){
            if ($value == 'onk') {
                return true;
            }
            
            return false;
        }));
    }
}











