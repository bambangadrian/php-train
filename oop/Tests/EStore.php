<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   -
 * @author    Widianto <ankakaito880123@gmail.com>
 */
require_once __DIR__ . '/../../vendor/autoload.php';
$DataCost = new \PhpTrain\Excercise\EStore\Costumer('CST001', 'Si komang', 'Laki - laki','Bumisani','0123456789');
echo '[' . $DataCost->getIdCost() . ']' . $DataCost->getNameCost(
    ) . '- Jenis Kelamin ( Jangan di gambar: ' . $DataCost->getGendre() . ' - Alamat: ' . $DataCost->getAddress(
    ) . ' - No Contact: ' . $DataCost->getNoContact() . ')';
