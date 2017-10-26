<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   PhpTrain
 * @author    Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */

namespace PhpTrain\Exercise\EStore;

# Loader 2 types: lazy loader, easy loader.
/**
 * ShoppingCart class description.
 *
 * @package    PhpTrain
 * @subpackage Exercise\EStore
 * @author     Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 */
class ShoppingCart implements \PhpTrain\Exercise\EStore\Contracts\TransactionSourceInterface
{

    /**
     * Items collection data property on the shopping cart.
     *
     * @var \PhpTrain\Exercise\EStore\CartItemCollection[] $Items
     */
    private $Items;

    /**
     * Shopping cart owner property.
     *
     * @var \PhpTrain\Exercise\EStore\Customer $Owner
     */
    private $Owner;

    /**
     * Shopping cart session id property.
     *
     * @var string $SessionId
     */
    private $SessionId;

    public function __construct($sessionId = null)
    {
        $this->Items = [];
        if ($sessionId === null) {
            $sessionId = md5(time());
        }
        $this->SessionId = $sessionId;
    }

    /**
     * Add item into cart.
     *
     * @param \PhpTrain\Exercise\EStore\Product $product  Product instance parameter.
     * @param integer                           $quantity Quantity of product that want to be included into cart.
     *
     * @return void
     */
    public function addItem(\PhpTrain\Exercise\EStore\Product $product, $quantity = 1)
    {
        $this->modifyItem($product, $quantity);
    }

    /**
     * Get all product item collections.
     *
     * @return \PhpTrain\Exercise\EStore\CartItemCollection[]
     */
    public function getContents()
    {
        return $this->Items;
    }

    /**
     * Get shopping cart session id property.
     *
     * @return string
     */
    public function getSourceId()
    {
        return $this->SessionId;
    }

    /**
     * Remove item from cart.
     *
     * @param \PhpTrain\Exercise\EStore\Product               $product  Product instance parameter.
     * @param                                   integer |null $quantity Quantity that want to be removed from cart.
     *
     * @return void
     */
    public function removeItem(\PhpTrain\Exercise\EStore\Product $product, $quantity = null)
    {
        if (array_key_exists($product->getId(), $this->Items) === true) {
            $cartItemCollections = $this->Items[$product->getId()];
            if ($quantity === null) {
                $quantity = $cartItemCollections->getItemQuantity();
            }
            $quantity = -1 * $quantity;
            $this->modifyItem($product, $quantity);
        }
    }

    /**
     * Set the shopping cart owner.
     *
     * @param \PhpTrain\Exercise\EStore\Customer $customer
     *
     * @return void
     */
    public function setOwner(\PhpTrain\Exercise\EStore\Customer $customer)
    {
        $this->Owner = $customer;
        $this->Owner->setShoppingCart($this);
    }

    /**
     * Modify item collections on cart.
     *
     * @param \PhpTrain\Exercise\EStore\Product $product  Product instance parameter.
     * @param integer | null                    $quantity Product quantity parameter.
     *
     * @return
     */
    private function modifyItem(\PhpTrain\Exercise\EStore\Product $product, $quantity = null)
    {
        $indexItem = $product->getId();
        $itemIsExists = array_key_exists($indexItem, $this->Items);
        if ($itemIsExists === false) {
            if ($quantity === null) {
                $quantity = 1;
            }
            $this->Items[$indexItem] = new \PhpTrain\Exercise\EStore\CartItemCollection($this, $product, $quantity);
        } else {
            $cartItemCollections = $this->Items[$indexItem];
            $currentQty = $cartItemCollections->getItemQuantity();
            $currentProductStock = $product->getStock();
            $endOfQty = $currentQty + $quantity;
            $cartItemCollections->setItemQuantity($endOfQty);
            if ($endOfQty < 0) {
                throw  new \Exception('Invalid quantity amount given');
            }
            if ($endOfQty > $currentProductStock) {
                throw new \Exception('Out of stock');
            }
            if ($endOfQty === 0) {
                unset($this->Items[$indexItem]);
            }
        }
    }
}
