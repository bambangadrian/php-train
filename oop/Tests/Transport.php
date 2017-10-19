<?php

class PublicTransport
{

    private $Passengers;

    public static $PassengerTypeList = ['student', 'general'];

    private $BasicCostPerKm;

    private $PriceList;

    public function __construct()
    {
        $this->BasicCostPerKm = 2000;
        $this->setPriceList(
            [
                'student' => ['discount' => 0.5, 'max' => 5000],
                'general' => ['discount' => 0, 'max' => 20000]
            ]
        );
    }

    public function getBasicCostPerKm()
    {
        return $this->BasicCostPerKm;
    }

    public function setPriceList($priceList)
    {
        $this->PriceList = $priceList;
    }

    public function getPriceList()
    {
        return $this->PriceList;
    }

    public function getPassengers()
    {
        return $this->Passengers;
    }

    public function addPassengers($name, $routeDistance, $passengerType = 'general')
    {
        if (in_array($passengerType, self::$PassengerTypeList, true) === false) {
            throw new \Exception('invalid passenger type given');
        }
        $cost = $this->getTripCost($routeDistance, $passengerType);
        $this->Passengers[$name] = [
            'name'     => $name,
            'distance' => $routeDistance,
            'type'     => $passengerType,
            'cost'     => $cost
        ];
    }

    private function getTripCost($routeDistance, $passengerType)
    {
        $priceList = $this->getPriceList();
        if (array_key_exists($passengerType, $priceList) === false) {
            throw new \Exception('Invalid price list has been set-up, please check');
        }
        $selectedPriceList = $priceList[$passengerType];
        $amount = $routeDistance * $this->getBasicCostPerKm();
        $amount -= ($selectedPriceList['discount'] * $amount);
        if ($amount > $selectedPriceList['max']) {
            $amount = $selectedPriceList['max'];
        }
        return (float)$amount;
    }

    public function getPassengerCost($name)
    {
        if (array_key_exists($name, $this->Passengers) === true) {
            return $this->Passengers[$name]['cost'];
        }
        throw new \Exception('Passenger does not exists');
    }
}

$angkot = new PublicTransport();
$angkot->addPassengers('widi', 3, 'student');
$angkot->addPassengers('bambang', 10);
$angkot->addPassengers('wawan', 23, 'student');
echo '<pre>';
//var_dump($angkot->getPassengers());
var_dump($angkot->getPassengerCost('bambang'));
var_dump($angkot->getPassengerCost('widi'));
var_dump($angkot->getPassengerCost('wawan'));
