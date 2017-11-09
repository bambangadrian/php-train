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

namespace PhpTrain\Exercise\Estore;

class Invoice implements \PhpTrain\Exercise\Estore\Contracts\OutputInterface
{

    private $Data;

    public function __construct(\PhpTrain\Exercise\Estore\Transaction $transaction)
    {
        $this->Data = $transaction->getData();
    }

    public function getData()
    {
        return $this->Data;
    }

    public function format()
    {
        return new \PhpTrain\Exercise\Estore\InvoiceFormatter($this->getData());
    }
}
