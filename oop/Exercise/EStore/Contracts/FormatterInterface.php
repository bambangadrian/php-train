<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   PhpTrain
 * @author    Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */

namespace PhpTrain\Exercise\Estore\Contracts;

/**
 * FormatterInterface class description.
 *
 * @package    PhpTrain
 * @subpackage
 * @author     Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 */
interface FormatterInterface
{

    public function toArray();

    public function toJson();

    public function toTable();

    public function toPdf();

    public function output();
}
