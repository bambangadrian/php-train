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
        $jariJari = 1/2;
        return ($this->Alas * $jariJari)* $this->Tinggi;
    }

}

$segitiga = new Segitiga(7,2);
echo $segitiga->hitungLuas();

