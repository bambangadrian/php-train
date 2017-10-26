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

/**
 * Interface TransactionSourceInterface
 */
interface CustomerInterface
{

    /**
     * Get customer id property.
     *
     * @return string
     */
    public function getId();

    /**
     * Get customer name property.
     *
     * @return string
     */
    public function getName();

}