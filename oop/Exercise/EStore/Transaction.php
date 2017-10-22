<?php

namespace PhpTrain\Exercise\EStore;

class Transaction
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
     * Get shopping cart that own this item collection.
     *
     * @return string
     */
    public function getOwnedCart()
    {
        return $this->Cart->getSessionId();
    }

    /**
     * Get product instance property.
     *
     * @return \PhpTrain\Exercise\EStore\Product
     */
    public function getProductInstance()
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
}
