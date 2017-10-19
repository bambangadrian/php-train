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
interface BlockInterface
{

    public function getArea();
}

interface TwoDimensionBlockInterface extends \BlockInterface
{

    public function getData();
}

interface FormatterInterface
{

    const FORMAT_AS_STRING = 'string';

    const FORMAT_AS_JSON   = 'json';

    const FORMAT_AS_TABLE  = 'table';

    public function getDataSource();

    public function doFormat($formatType = \FormatterInterface::FORMAT_AS_STRING);

    public function asString();

    public function asJson();

    public function asTable();

    public function getResult();
}

abstract class AbstractFormatter implements \FormatterInterface
{

    private $Result;

    public function doFormat($formatType = \FormatterInterface::FORMAT_AS_STRING)
    {
        switch ($formatType) {
            case \FormatterInterface::FORMAT_AS_JSON:
                $this->Result = $this->asJson();
                break;
            case \FormatterInterface::FORMAT_AS_TABLE:
                $this->Result = $this->asTable();
                break;
            default:
                $this->Result = $this->asString();
                break;
        }
    }

    public function getResult()
    {
        return $this->Result;
    }

    public function asString()
    {
        $info = '';
        $dataSource = $this->getDataSource();
        foreach ($dataSource as $key => $value) {
            $info .= $key . ': ' . $value;
        }
        return $info;
    }

    public function asJson()
    {
        return json_encode($this->getDataSource());
    }

    public function asTable()
    {
        $info = '<table>';
        $dataSource = $this->getDataSource();
        foreach ($dataSource as $key => $value) {
            $info .= '<tr>';
            $info .= '<td>' . $key . '</td><td>' . $value . '</td> ';
            $info .= '</tr>';
        }
        $info .= '</table>';
        return $info;
    }
}

class TwoDimensionBlockInfoFormatter extends \AbstractFormatter
{

    private $Block;

    public function __construct(\TwoDimensionBlockInterface $block)
    {
        $this->Block = $block;
    }

    public function getDataSource()
    {
        $originDataSource = $this->Block->getData();
        $areaInfo = ['Area: ' . $this->Block->getArea()];
        return array_merge($originDataSource, $areaInfo);
    }
}

abstract class AbstractTwoDimension implements \TwoDimensionBlockInterface
{

}

class Square extends \AbstractTwoDimension
{

    private $SideLength;

    public function __construct($sideLength)
    {
        $this->SideLength = $sideLength;
    }

    public function getArea()
    {
        return $this->SideLength * $this->SideLength;
    }

    protected function getData()
    {
        return ['SideLength' => $this->SideLength];
    }
}

class Triangle extends \AbstractTwoDimension
{

    private $Width;

    private $Height;

    public function __construct($width, $height)
    {
        $this->Width = $width;
        $this->Height = $height;
    }

    public function getArea()
    {
        return 0.5 * $this->Height * $this->Width;
    }

    protected function getData()
    {
        return ['Width' => $this->Width, 'Height' => $this->Height];
    }
}

$triangle = new \Triangle(10, 8);
$infoFormatter = new \TwoDimensionBlockInfoFormatter($triangle);
$infoFormatter->doFormat(\FormatterInterface::FORMAT_AS_TABLE);
echo $infoFormatter->getResult();