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

class InvoiceFormatter implements
    \PhpTrain\Exercise\Estore\Contracts\OutputInterface,
    \PhpTrain\Exercise\Estore\Contracts\FormatterInterface
{

    private $Data;
    private $Output;

    private $Type;

    public function __construct(array $data)
    {
        $this->Data = $data;
    }

    public function toArray()
    {
    }

    public function getData()
    {
        return $this->getData;
    }

    public function format()
    {
        return new InvoiceFormatter($this->getData());
    }

    public function toJson()
    {
        $this->Output = json_encode($this->Data);
        $this->Type = 'string';
        return $this;
    }

    public function toPdf()
    {
    }

    public function toTable()
    {
    }

    public function output(){
        switch($this->Type){
            case 'string':
                echo $this->Output;
                break;
            case 'download':
                break;
        }
    }
}