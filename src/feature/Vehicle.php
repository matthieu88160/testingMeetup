<?php
namespace test\feature;

class Vehicle
{
    public function accelerate(int $initialSpeed, int $accelerationFactor) : int
    {
        $result = $initialSpeed + $accelerationFactor;
        if ($result < 0) {
            throw new \LogicException('Speed cannot be lower than zero');
        }
        
        return $result;
    }
    
    public function onk()
    {
        return 'onk';
    }

    public function getDriverLicense(Driver $driver, string $date)
    {
        $licenseExtractor = new DriverExtractor();
        return $licenseExtractor->extractLicense($driver);
    }
}

