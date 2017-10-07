<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   -
 * @author    Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */
require_once __DIR__ . '/../../vendor/autoload.php';
$product = new \PhpTrain\Exercise\EStore\Product('ES001', 'TV LG 32 Inch', 15);
$product->setPrice(1500000);
echo '[' . $product->getId() . '] ' . $product->getName() . ' (Stock: ' . $product->getStock(
    ) . ' - Price: ' . $product->getPrice() . ')';
echo "<br />";
$customer = new \PhpTrain\Exercise\EStore\Customer('WA001', 'WAWAN', 'Indonesia', 'setyawanfaisal90@gmail.com');
echo '[' . $customer->getId() . '] ' . $customer->getName() . ' (And Alamat : ' . $customer->getAddress(
    ) . ' Email : ' . $customer->getEmail() . ')';
