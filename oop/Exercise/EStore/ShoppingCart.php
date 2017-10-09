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
class ShoppingCart
{

    /**
     * Items collection data property on the shopping cart.
     *
     * @var \PhpTrain\Exercise\EStore\CartItemCollection $Items
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
        if ($sessionId === null) {
            $sessionId = md5(time());
        }
        $this->SessionId = $sessionId;
    }

    /**
     * Add item into cart.
     *
     * @return void
     */
    public function addItem(\PhpTrain\Exercise\EStore\Product $product, $quantity)
    {
        $this->Items[] = new  \PhpTrain\Exercise\EStore\CartItemCollection($this, $product, $quantity);
    }

    /**
     * Get all product item collections.
     *
     * @return \PhpTrain\Exercise\EStore\CartItemCollection[]
     */
    public function getCartContents()
    {
        return $this->Items;
    }

    /**
     * Get shopping cart session id property.
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->SessionId;
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
}
