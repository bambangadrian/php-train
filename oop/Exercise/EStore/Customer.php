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

namespace PhpTrain\Exercise\Estore;

class Customer
{

    /**
     * Customer identifier property.
     *
     * @var string $Id
     */
    private $Id;

    /**
     * Customer name property.
     *
     * @var string $Name
     */
    private $Name;

    /**
     * Shopping cart that owned by customer.
     *
     * @var \PhpTrain\Exercise\EStore\ShoppingCart $ShoppingCart
     */
    private $ShoppingCart;

    /**
     * Customer constructor.
     */
    public function __construct($code, $name)
    {
        $this->setId($code);
        $this->setName($name);
    }

    /**
     * Get customer identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Get Customer name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get shopping cart instance that owned by customer.
     *
     * @return \PhpTrain\Exercise\EStore\ShoppingCart
     */
    public function getShoppingCart()
    {
        return $this->ShoppingCart;
    }

    /**
     * Set customer id.
     *
     * @param string $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * Set customer name.
     *
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * Assign shoppinc cart to customer.
     *
     * @param \PhpTrain\Exercise\EStore\ShoppingCart $cart Shopping cart instance parameter.
     *
     * @return void
     */
    public function setShoppingCart(\PhpTrain\Exercise\EStore\ShoppingCart $cart)
    {
        $this->ShoppingCart = $cart;
    }
}
