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
interface TransactionSourceInterface
{

    /**
     * Get transaction source object identifier property.
     *
     * @return string
     */
    public function getSourceId();

    /**
     * Get transaction source contents data.
     *
     * @return \PhpTrain\Exercise\EStore\Contracts\TransactionItemInterface[]
     */
    public function getContents();
}