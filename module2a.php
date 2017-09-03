<?php

/**
* File module2a.php - All about stucture, and operators.

* @author widianto <ankakaito880123@gmail.com>
* @licence unknown
* @package php-train
**/


/** 
* Message variable
* @var string @messahe
**/
$a = "Hellow";
echo @a;

/**
* Boelan Variables.
* @var booelan @bool
**/
$bool = true;
echo $bool;

/**
* integer variables.
* @var integer $integer
**/
$int = 4;
echo $int;

/**
* Float numeric variables
* @var float $float
**/
$float = 4.5;
echo $float;

/**
* Constant variables
* @const string CONSTANT_SAMPLE
**/
define('CONSTANT_SAMPLE', 'It is a constant sample');
echo CONSTANT_SAMPLE;
/**
* Array variable declaration
* @var array $array
**/
$array = [];


# OPERATOR AND OPERATOR INSTRUCTION
# 1. Assigment
# Constant can not be assigmed after declaration, 'cause it' onluy used to set one time
# 2. Aritmatic
$result = $float + $int;
echo $result;
# 3. Incremental / Decremental
# 4. Logical
# 5. Comparison
# 6 byte Placement