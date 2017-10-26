<?php

class PersegiPanjang{

    //atribut
    private $Panjang;

    private $Lebar;
    //metode / behaviour
    public function __construct($panjang, $lebar)
    {
        $this->Panjang = $panjang;
        $this->Lebar = $lebar;
    }

    public function hitungLuas()
    {
        //$luas = $nilai1 * $nilai2;
        //return $luas;
        return $this->Panjang * $this->Lebar;
    }

}

$persegi = new PersegiPanjang(7,2);
echo $persegi->hitungLuas();

