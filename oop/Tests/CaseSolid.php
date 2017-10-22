<?php

/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   -
 * @author    Muhammad Faisal Setyawan <setyawanfaisal90@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */
interface HumanInterface
{

    public function getData();
}

interface FormatterInterface
{

    const FORMAT_AS_STRING = 'string';

    const FORMAT_AS_JSON   = 'json';

    const FORMAT_AS_TABLE  = 'table';

    public function asJson();

    public function asString();

    public function asTable();

    public function doFormat($formatType = \FormatterInterface::FORMAT_AS_STRING);

    public function getDataSource();

    public function getResult();
}

abstract class AbstractFormatter implements \FormatterInterface
{

    private $Result;

    public function asJson()
    {
        return json_encode($this->getDataSource());
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
}

class HumanInfoFormatter extends \AbstractFormatter
{

    private $Info;

    public function __construct(\HumanInterface $info)
    {
        $this->Info = $info;
    }

    public function getDataSource()
    {
        return $this->Info->getData();
    }
}

abstract class AbstractHuman implements \HumanInterface
{

}

class Human extends \AbstractHuman
{

    private $Birthday;

    private $Name;

    public function __construct($name, $birthday)
    {
        $this->Name = $name;
        $this->Birthday = $birthday;
    }

    public function getData()
    {
        return [
            'Name'    => $this->Name,
            'Birthday' => $this->Birthday
        ];
    }
}

$human = new \Human('Wawan', '01-08-1994');
$infoFormatter = new \HumanInfoFormatter($human);
$infoFormatter->doFormat(\FormatterInterface::FORMAT_AS_TABLE);
echo $infoFormatter->getResult();


