<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

abstract class Human
{

    private $Name;

    private $BirthDate;

    private $Gender;

    protected $Behave;

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getGender()
    {
        return $this->Gender;
    }

    public function setGender($gender)
    {
        $this->Gender = $gender;
    }

    protected function setBehave($behave)
    {
        $this->Behave = $behave;
    }

    protected function getBehave()
    {
        return $this->Behave;
    }

    public function getInfo()
    {
        return $this->getName() . ' is a ' . $this->getGender() . ' (' . $this->getBehave() . ')';
    }
}

class Male extends Human
{

    public function __construct()
    {
        $this->setGender('Male');
        $this->setBehave('Crowdy');
    }
}

class Female extends Human
{

    public function __construct()
    {
        $this->setGender('Female');
        $this->setBehave('Beauty Mindset');
    }
}

$widi = new Male();
$widi->setName('Widiyanto');
dump($widi->getInfo());
# ----------
$bambang = new Female();
$bambang->setName('Bambang');
dump($bambang->getInfo());