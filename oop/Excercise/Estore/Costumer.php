<?php

namespace PhpTrain\Excercise\EStore;

/**
 * Class Costumer
 *
 * @package PhpTrain\Exercise\Esore
 * @author  Widianto <ankakaito880123@gmail.com>
 */
class Costumer
{

    /**
     * Costumer identifier property
     *
     * @var sting $IdCost
     */
    Private $IdCost;

    /**
     * Costumer Name Property
     *
     * @var string $NameCost
     */
    Private $NameCost;

    /**
     *
     * @var $Gendre
     */
    Private $Gendre;

    /**
     * @var $Address
     */
    Private $Address;

    /**
     * @var $NoContact
     */
    Private $NoContact;

    public function __construct($IdCost, $NameCost, $Gendre, $Address, $NoContact)
    {
        $this->setIdCost($IdCost);
        $this->setNameCost($NameCost);
        $this->setGendre($Gendre);
        $this->setAddress($Address);
        $this->setNoContact($NoContact);
    }

    /**
     * @return \PhpTrain\Exercise\Esore\sting
     */
    public function getIdCost()
    {
        return $this->IdCost;
    }

    /**
     * @return string
     */
    public function getNameCost()
    {
        return $this->NameCost;
    }

    /**
     * @return mixed
     */
    public function getGendre()
    {
        return $this->Gendre;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @return mixed
     */
    public function getNoContact()
    {
        return $this->NoContact;
    }


    /**
     * @param \PhpTrain\Exercise\Esore\sting $IdCost
     */
    public function setIdCost($IdCost)
    {
        $this->IdCost = $IdCost;
    }

    /**
     * @param string $NameCost
     */
    public function setNameCost($NameCost)
    {
        $this->NameCost = $NameCost;
    }

    /**
     * @param string $Gendre
     */
    public function setGendre($Gendre)
    {
        $this->Gendre = $Gendre;
    }

    /**
     * @param string $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @param string $NoContact
     */
    public function setNoContact($NoContact)
    {
        $this->NoContact = $NoContact;
    }

}
