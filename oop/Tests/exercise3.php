<?php

class hitungLuas{

    private $TypeBangun;

    private $RumusBangun;

    /**
     * @param mixed $RumusBangun
     */
    public function setRumusBangun($rumusBangun)
    {
        $this->RumusBangun = $rumusBangun;
    }

    /**
     * @return mixed
     */
    public function getRumusBangun()
    {
        return $this->RumusBangun;
    }

    public function __construct()
    {
        $this->setRumusBangun (
          [
              'persegi' => [0, 0],
              'persegi_panjang' => [0, 0],
              'segitiga'=> [0.5*0, 0]
          ]  
        );
    }

    public function inputNilaiBangun($name, $nilai1, $nilai2)
    {
        $luas = $this->hitungLuas($name, $nilai1, $nilai2);
        $this->TypeBangun[$name] = [
            'name'      => $name,
            'nilai1'    => $nilai1,
            'nilai2'    => $nilai2,
            'luas'      => $luas
        ];
    }

    public function  hitungLuas($name, $nilai1, $nilai2)
    {
        $rumusBangun = $this->getRumusBangun();
        $pilihRumus = $rumusBangun[$name];
        $cariluas = $nilai1 * $nilai2;
    }
    public function LuasBangun($name)
    {
        return $this->TypeBangun[$name]['luas'];
    }
}

$hitung = new hitungLuas();
$hitung->inputNilaiBangun('persegi', 7, 4);
$hitung->inputNilaiBangun('segitiga', 7, 4);
echo '<pre>';
var_dump($hitung->LuasBangun('persegi'));
var_dump($hitung->LuasBangun('segitiga'));