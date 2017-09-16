<?php
# PHP: LOOSELY TYPE PROGRAMMING. ( < php 7.0 )
# PHP: STRICTLY TYPE PROGRAMMING ( >= php 7.0 )
/**
* File module2a.php - All about data structure, types, and operators.
*
* @author Bambang Adrian S <bambang.adrian@gmail.com>
* @license Unknown
* @package php-train
**/

# Name type convention:
# 1. snake_case
# 2. PascalCase
# 3. camelCase
# 4. CONSTANT_CASE


# Some native function that can be used to display the variables container are:
# 1. echo: string, numeric, NOT FOR STRUCTURED TYPES (array, class, resource)
# 2. print_r: Can display the variable values.
# 3. var_dump: Full dumping model of variable container.

echo '<pre>';
/**
* Message variables.
* @var string $message
**/
$message = 'Hello';
var_dump($message);

/**
* Boolean variables.
* @var boolean $bool
**/
$bool = false;
var_dump($bool);
# Auto-casting boolean:
# false: 0, null, [], ''
# true: !0, !null, [a], 'a'

/**
* Integer variables.
* @var integer $int
**/
$int = 4;
var_dump($int);

/**
* Float numeric variables.
* @var float $float
**/
$float = 4.5;
var_dump($float);

/**
* Constant variables.
* @const string CONSTANT_SAMPLE
**/
define('CONSTANT_SAMPLE', 'it is a constant sample');
var_dump(CONSTANT_SAMPLE);

# Always use short syntax for array declaration as possible.
/**
* Array variable declaration.
* @var array $array
**/
$array = [];
var_dump($array);

# OPERATOR AND OPERAND INTRODUCTION.
# ----------------------------------
# 1. Assignment
# Constant can not be assigned after declaration, 'cause it's only used to set one time.
# 2. Arithmetic 
# + (Addition), - (Substraction), * (Multiply), / (Divide), % (Modulus)
$result = $float + $int;
var_dump($result);
$result = $float/$float;
var_dump($result);
$result = $bool + $int;
var_dump($result);
$result = $message + $int;
var_dump($result);
$result = $float%$int;
var_dump($result);
$result = 20/3;
var_dump($result);
$result -= 3;
var_dump($result);
$result /= 2; # $result = $result/2;
var_dump($result);
# 3. Incremental/Decremental
# -- (decremental), ++ (incremental)
$start = 1;
$start++; # Suffix
var_dump($start);
$end = 1;
++$end;
var_dump($end);
$result = $start++ + ++$end;
var_dump($result);
var_dump($start);
var_dump($end);
# 4. Logical (!)
# This operator only return boolean.
$data = 'a';
$data2 = !$data;
var_dump($data2);
# 5. Comparison (boolean)
# == (EQ, equal), !=, (NEQ, not equal, used for string, boolean, object, resource, array) [NOT STANDARD USE]
# <> (NEQ, not equal, used for numeric)
# < (LT, less than), > (GT, greater than)
# <= (LET, less equal than) , >= (GET, greater equal than) 
# === (IDT, identical), !== (NID, not identical) [STANDARD PSR USE]
# <=> (Spaceship) php 7.x
$var1 = 0;
$var2 = 0;
var_dump($var1 === $var2);
# STANDARD COMPARISON : ALWAYS USE ALL IDENTICAL COMPARISON.

# 6. Byte Placement
$number = 15;
var_dump($number >> 1);
var_dump($number << 1);




echo '</pre>';
