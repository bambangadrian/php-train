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
 * Product class description.
 *
 * @package    PhpTrain
 * @subpackage Exercise\EStore
 * @author     Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 */
class Product
{

    /**
     * Product identifier property.
     *
     * @var string $Id
     */
    private $Id;

    /**
     * Product name property.
     *
     * @var string $Name
     */
    private $Name;

    /**
     * Product price property.
     *
     * @var float $Price
     */
    private $Price;

    /**
     * Product stock property.
     *
     * @var integer $Stock
     */
    private $Stock;

    # Every parameter on construct must be provides all mandatory fields

    /**
     * Product constructor.
     */



    public function __construct($code, $name, $stock)
    {
        $this->setId($code);
        $this->setName($name);
        $this->setStock($stock);
    }

    /**
     * Get product identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Get product name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get product price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Get product stock.
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->Stock;
    }
    /**
     * Set product identifier.
     *
     * @param string $Id
     */

    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * Set product name.
     *
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * Set product price.
     *
     * @param float $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * Set product stock.
     *
     * @param integer $Stock
     */
    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }

}
