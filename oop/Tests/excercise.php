<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

class vehicle
{
    private $Name;
    private $Type;

    public function setName($name)
    {
        $this->Name = $name;
    }
    public function  getName()
    {
        return $this->Name;
    }
    public function setType($Type)
    {
        $this->Type = $Type;
    }
    public function getType()
    {
        return $this->Type;
    }
    public function __construct()
    {
        $this->setType('motorcycle');
    }
}
$vehicle = new vehicle();
$vehicle->setName('Motor Yamaha');
echo $vehicle->getName() . ' | ' . $vehicle->getType();