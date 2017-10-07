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
include __DIR__ . '/../src/libs.php';
if(function_exists('printName') === false){
    /**
     * Function to print name.
     *
     * @param string $name Name paramter.
     * 
     * @return void
     */
    function printName($name){
        echo $name;
    }
}
echo 'test';
