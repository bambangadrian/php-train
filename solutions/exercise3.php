<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

dump($_POST);

function getTransaksi()
{
    $harga = $_POST['name'];
    $proses = $_POST['submit'];
    if ($proses !== null and $proses !== '') {
      $transaksi = getBayar($harga);
    }
    return $transaksi;
}
function getBayar($harga)
{
  return $harga - getDiskon($harga);

}
function getDiskon($harga){
    $discount = $_POST['discount'];
    $pot = $harga * $discount / 100;
    return $pot;

}

$harga = $_POST['name'];
dump($harga);
dump(getBayar($harga));
dump(getDiskon($harga));
echo getTransaksi();
?>
<form method="post">
    <input type="number" name="name" required="required"/>
    <input type="number" name="discount" required="required"/>
    <input type="submit" name="submit" />
</form>