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
if (function_exists('renderPage') === false) {
    /**
     * Render the page.
     *
     * @return void
     */
    function renderPage()
    {
        echo getMultiplyTable(10, 10);
    }
}
if (function_exists('createTable') === false) {
    /**
     * Create very basic table.
     *
     * @param array $headData Head row data collection.
     * @param array $bodyData Body data collection.
     *
     * @return string
     */
    function createTable(array $headData = [], array $bodyData = [])
    {
        $result = '<table border="1">';
        if (count($headData) > 0) {
            $result .= '<thead>';
            foreach ($bodyData as $data) {
                $result .= createTableRow($data, 'head');
            }
            $result .= '</tbody>';
        }
        if (count($bodyData) > 0) {
            $result .= '<tbody>';
            foreach ($bodyData as $data) {
                $result .= createTableRow($data);
            }
            $result .= '</tbody>';
        }
        return $result . '</table>';
    }
}
if (function_exists('createTableRow') === false) {
    /**
     * Create table row data
     *
     * @param array $rowData Row data parameter.
     *
     * @return string
     */
    function createTableRow(array $rowData = [], $type = 'body')
    {
        $result = '<tr>';
        $columnTag = 'td';
        if ($type === 'head') {
            $columnTag = 'th';
        }
        foreach ($rowData as $value) {
            $result .= '<' . $columnTag . '>' . $value . '</' . $columnTag . '>';
        }
        return $result . '</tr>';
    }
}
if (function_exists('getMultiplyTable') === false) {
    /**
     * Get multiply table.
     *
     * @param integer $row    Max row data parameter.
     * @param integer $column Max column data parameter.
     *
     * @return string
     */
    function getMultiplyTable($row = 5, $column = 5)
    {
        $multiplyData = getMultiplyData($row, $column);
        return createTable([], $multiplyData);
    }
}
if (function_exists('getMultiplyData') === false) {
    /**
     * Get multiply array data collection.
     *
     * @param integer $xLimit Row limit parameter.
     * @param integer $yLimit Column limit parameter.
     *
     * @return array
     */
    function getMultiplyData($xLimit = 5, $yLimit = 5)
    {
        $result = [];
        for ($x = 0; $x < $xLimit; $x++) {
            for ($y = 0; $y < $yLimit; $y++) {
                $result[$x][$y] = ($x + 1) * ($y + 1);
            }
        }
        return $result;
    }
}
# Start to render the page itself.
renderPage();
