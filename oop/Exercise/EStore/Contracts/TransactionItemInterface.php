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

namespace PhpTrain\Exercise\EStore\Contracts;

interface TransactionItemInterface
{

    /**
     * Get transaction item name property.
     *
     * @return string
     */
    public function getItemName();

    /**
     * Get transaction item code property.
     *
     * @return string
     */
    public function getItemCode();

    /**
     * Get transaction item quantity property.
     *
     * @return integer
     */
    public function getItemQuantity();

    /**
     * Get transaction item price property.
     *
     * @return float
     */
    public function getItemPrice();

}
