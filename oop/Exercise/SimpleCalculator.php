<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   PhpTrain\Exercise
 * @author    Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */

namespace PhpTrain\Exercise;

/**
 * Simple calculator class.
 *
 * @package    PhpTrain
 * @subpackage Exercise
 */
class SimpleCalculator
{

    /**
     * SimpleCalculator constructor.
     *
     * @return $this
     */
    public function __construct()
    {
    }

    /**
     * Get addition result.
     *
     * @param integer $num1 First numeric parameter.
     * @param integer $num2 Second numeric parameter.
     *
     * @return integer
     */
    public function getAddition($num1, $num2)
    {
        return $num1 + $num2;
    }

    /**
     * Get substraction result.
     *
     * @param integer $num1 First numeric parameter.
     * @param integer $num2 Second numeric parameter.
     *
     * @return integer
     */
    public function getSubstract($num1, $num2)
    {
        return $num1 - $num2;
    }
}

# Mockup
//$calculator = new \PhpTrain\Excersice\SimpleCalculator();
//$calculator->getSubstract($num1, $num2);
//$calculator->getAddition($num1, $num2);
