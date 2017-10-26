<?php

class Transport
{

    private $Passenger;

    private $TypePassenger;

    /**
     * @param mixed $Passenger
     */
    public function setPassenger($Passenger)
    {
        $this->Passenger = $Passenger;
    }

    /**
     * @param mixed $TypePassenger
     */
    public function setTypePassenger($TypePassenger)
    {
        $this->TypePassenger = $TypePassenger;
    }

    /**
     * @return mixed
     */
    public function getPassenger()
    {
        return $this->Passenger;
    }

    /**
     * @return mixed
     */
    public function getTypePassenger()
    {
        return $this->TypePassenger;
    }

    public function __construct()
    {

    }
}

$transport = new Transport();
$transport->setPassenger('widi');
$transport->setTypePassenger('student');
echo $transport->getPassenger() .' | ' . $transport->getTypePassenger();