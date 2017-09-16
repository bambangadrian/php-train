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
echo '<pre>';
# TYPE CASTING .
# Converting one type to another types.
$bool = false;
$int = 4;
# var_dump((boolean)$int);
$result = (integer)$bool + $int;
# (integer) : Convert to integer
# (boolean) : Convert to boolean
# (array) : Convert to array
# ([Interface]) : Convert to defined type.
# (float) : Convert to float
# (string) : Convert to string
function nl()
{
    echo "\n";
}

# Conditional statement.
# if, if..else.., switch..case
$age = 6.7;
# age < 15, child
# 15 <= age < 40, teenager
# age >= 40, adult
# Out of condition range.. print invalid age.
if ($age < 15 and $age >= 0) {
    echo 'You are still a child';
} elseif ($age >= 15 and $age < 40) {
    echo 'You are a teenager';
} elseif ($age >= 40) {
    echo 'You are an adult';
} else {
    echo 'Invalid age';
}
nl();
$ascii = 'J';
# Switch..case (numeric and boolean), exact value.
$asciiNo = ord($ascii);
switch ($asciiNo) {
    case $asciiNo <= 90:
        echo 'Range on Uppercase';
        break;
    default:
        echo 'Range on Lowercase';
}
nl();
# LOOPING.
# for, foreach, while, do..while
//for($counter=1;$counter<=10;$counter++){
//    echo $counter;
//    nl();
//}
//$counter2= 3;
# For looping with multiple condition.
//for($counter1 = 1;$counter1<=10 and $counter2<=30;$counter1++){
//    echo $counter1;
//    nl();
//    echo $counter2;
//    nl();
//    $counter2 *= 4;
//}
//$counter=1;
//while($counter <=10){
//    echo $counter;
//    nl();
//    $counter++;
//}
//for(;;){
//
//}
//while(true){
//
//}
$counter = 5;
do {
    echo $counter;
    nl();
    $counter++;
} while ($counter <= 10);
# Foreach : Only used for array and object
$arr1 = [
    'bambang',
    'widi',
    'wawan'
];
# $arr1 = [0 => 'bambang', 1 => 'widi', 2 => 'wawan']
$totalArr = count($arr1);
for($index=0; $index<$totalArr; $index++){
    echo 'name on index ' . $index . ' is ' . $arr1[$index];
    nl();
}
nl();
foreach ($arr1 as $index => $name) {
    echo 'name on index ' . $index . ' is ' . $name;
    nl();
}
# FUNCTION.
function test($args)
{
    return $args + 1;
}

function funcSayHello($name)
{
    return 'hi, ' . $name;
}

# METHOD.
function sayHello()
{
    echo 'hi';
}

function abcd($args)
{
    $args += 1;
    var_dump($args);
}

$function = test(2);
var_dump($function);
abcd(2);
sayHello();
nl();
$message = funcSayHello('Bambang');
echo $message;
# METHOD with args (mandatory and optional)
function sayHello2($name, $additionalMessage)
{
    echo 'Hi, ' . $name;
    if ($additionalMessage !== '') {
        nl();
        echo $additionalMessage;
    }
}

echo '</pre>';