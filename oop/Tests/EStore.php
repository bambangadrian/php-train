<?php

namespace PhpTrain\Exercise\EStore;

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
echo '<pre>';
try {
    $product = new \PhpTrain\Exercise\EStore\Product('ES001', 'TV LG 32 Inch', 15);
    $product->setPrice(1500000);
    $cart = new \PhpTrain\Exercise\EStore\ShoppingCart();
    $cart->addItem($product, 5);
    $customer = new \PhpTrain\Exercise\EStore\Customer('CUST001', 'Bambang');
    //$cart->setOwner($customer);
    $customer->setShoppingCart($cart);
    $product2 = new \PhpTrain\Exercise\EStore\Product('SN001', 'Taro', 25);
    $product2->setPrice(5000);
    $customerCart = $customer->getShoppingCart();
    $customerCart->addItem($product2, 10);
    $customerCart->addItem($product2, 3);
    $customerCart->removeItem($product2, 5);
    $customerCart->removeItem($product2, 5);
    $customerCart->removeItem($product, 1);
    $customerCartContent = $customerCart->getContents();
    foreach ($customerCartContent as $item) {
        $itemProduct = $item->getItemInstance();
        echo $itemProduct->getId() . ' | ' . $itemProduct->getName() . ' | ' . $itemProduct->getPrice(
            ) . ' | ' . $item->getItemQuantity();
        echo '<br />';
    }
    $product2->setPrice(6000);
    $customer->doCheckout();
    $transactions = $customer->getTransactionList();
    $idTransaction = 'TRX-' . md5(date('Ymd'));
    $total = $customer->getTransaction($idTransaction)->getTotal();
    $customer->getInvoice($idTransaction)->format()->toJson()->output();
} catch (\Exception $ex) {
    echo $ex->getMessage();
}
