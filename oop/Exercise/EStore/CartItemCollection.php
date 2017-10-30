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

/**
 * CartItemCollection class description.
 *
 * @package    PhpTrain
 * @subpackage Exercise\EStore
 * @author     Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 */
class CartItemCollection implements \PhpTrain\Exercise\EStore\Contracts\TransactionItemInterface
{

    /**
     * Shopping cart instance property.
     *
     * @var \PhpTrain\Exercise\EStore\ShoppingCart $Cart
     */
    private $Cart;

    /**
     * Product instance.
     *
     * @var \PhpTrain\Exercise\EStore\Product $Product
     */
    private $Product;

    /**
     * Item quantity property.
     *
     * @var integer $Quantity
     */
    private $Quantity;

    /**
     * CartItemCollection constructor.
     *
     * @param \PhpTrain\Exercise\EStore\ShoppingCart $cart     Shopping cart instance parameter.
     * @param \PhpTrain\Exercise\EStore\Product      $product  Product instance parameter.
     * @param integer                                $quantity Item quantity parameter.
     *
     * @throws \Exception If given quantity greater than available product stock.
     * @return $this
     */
    public function __construct(
        \PhpTrain\Exercise\EStore\ShoppingCart $cart,
        \PhpTrain\Exercise\EStore\Product $product,
        $quantity
    ) {
        $this->Cart = $cart;
        $this->Product = $product;
        $productStock = $this->Product->getStock();
        if ($quantity > $productStock) {
            throw new \Exception('Product quantity greater than available stock');
        }
        $this->Quantity = $quantity;
    }

    /**
     * Get item quantity property.
     *
     * @return integer
     */
    public function getItemQuantity()
    {
        return $this->Quantity;
    }

    /**
     * Get shopping cart that own this item collection.
     *
     * @return string
     */
    public function getOwnedCart()
    {
        return $this->Cart->getSourceId();
    }

    /**
     * Get product instance property.
     *
     * @return \PhpTrain\Exercise\EStore\Product
     */
    public function getItemInstance()
    {
        return $this->Product;
    }

    /**
     * Set item quantity.
     *
     * @param integer $qty Item quantity parameter.
     *
     * @return void
     */
    public function setItemQuantity($qty)
    {
        $this->Quantity = $qty;
    }

    /**
     * Get cart item name property.
     *
     * @return string
     */
    public function getItemName()
    {
        return $this->Product->getName();
    }

    /**
     * Get cart item code property.
     *
     * @return string
     */
    public function getItemCode()
    {
        return $this->Product->getId();
    }

    /**
     * Get cart item price property.
     *
     * @return float
     */
    public function getItemPrice()
    {
        return $this->Product->getPrice();
    }

    /**
     * Get cart item stock property.
     *
     * @return integer
     */
    public function getItemStock()
    {
        return $this->Product->getStock();
    }
}
