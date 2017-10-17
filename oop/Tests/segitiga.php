<?php

class Segitiga{

    //atribut
    private $Alas;

    private $Tinggi;
    //metode / behaviour
    public function __construct($alas, $tinggi)
    {
        $this->Alas = $alas;
        $this->Tinggi = $tinggi;
    }

    public function hitungLuas()
    {
        //$luas = $nilai1 * $nilai2;
        //return $luas;
        return ($this->Alas * 0.5)* $this->Lebar;
    }

}

$segitiga = new Segitiga(7,2);
echo $segitiga->hitungLuas();

