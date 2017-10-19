<?php

namespace PhpTrain\Exercise\EStore;

class Transaction
{
    private $PaymentType;

    private $PaymentMethod;


    public function __construct()
    {
        $this->setPaymentType(
            ['COD', 'transfer']
        );

        $this->setPaymentMethod(
            ['cash', 'kredit']
        );
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->PaymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->PaymentType;
    }

}
