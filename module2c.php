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
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

# STRING MANIPULATION : strlen, substr, str_replace, ucwords, ucfirst, strtolower, strtoupper.
$text = 'bambang adrian sitompul';
dump(strlen($text));
dump(str_replace('adrian', 'widiyanto', $text));
dump(ucwords($text));
dump(ucfirst($text));
dump(trim($text, 'blau'));
dump(explode(' ', $text));
# Anonymous function.
$func = function ($message) {
    echo $message;
};
$func('Hello bambang');
dump($func);
function sayHello($message)
{
    $func = function ($message) {
        return 'Your message is: ' . $message;
    };
    echo $func($message);
}

sayHello('Welcome, bambang');
$funcModifyTextToCapital = function ($text) {
    return strtoupper($text);
};
$funcModifyTextToLower = function ($text) {
    return strtolower($text);
};
function getModifiedText($text, \Closure $closure)
{
    return $closure($text);
}

dump(getModifiedText('hello bambang', $funcModifyTextToCapital));
dump(getModifiedText('Welcome Bambang Adrian SITOMPUL', $funcModifyTextToLower));
# ARRAY MANIPULATION.
## Filtering.
$array = ['bambang', 'eko', 'widi'];
dump(
    array_filter(
        $array,
        function ($value) {
            return $value !== 'eko';
        }
    )
);
## Concat and Merging.
$array1 = ['bambang', 'index' => 'widi', 'reza'];
$array2 = ['eko', 'index' => 'adam', 'xxx' => 'wawan', 'reza'];
$result = array_merge($array1, $array2);
dump($array1 + $array2);
dump($result);
## Searching.
dump(array_search('reza', $result, true));
dump(array_search('minggar', $result, true));
dump(array_keys($result, 'reza'));
dump(array_keys($result));
dump(array_keys(array_keys($result), 'xxx', true));
# Cut & Fill
$latestPop = array_pop($result);
dump($latestPop);
dump($result);
$shiftedData = array_shift($result);
dump($shiftedData);
dump($result);
$unShiftedData = array_unshift($result, 'reza');
dump($unShiftedData);
dump($result);
$pushedData = array_push($result, 'bambang');
dump($pushedData);
dump($result);
# Accessing.
dump($result[2]);
dump(array_values($result));
# Condition.
dump(is_array($result));
dump(is_array($funcModifyTextToLower));
dump(array_key_exists('xxx', $result));
dump(array_key_exists('dicky', $result));
# Mapping.
$result2 = array_map(
    function ($value) {
        return 'My name is ' . $value;
    },
    $result
);
dump($result2);
dump(array_diff($result, ['wawan', 'bambang'], ['adam']));
$keys = ['test1', 'test2', 'test3'];
$values = ['data1', 'data2', 'data3'];
dump(array_combine($keys, $values));

# Standard function.
# Eg: empty, is_null, is_int, is_numeric.
# isset, unset
# Not standard: empty, is_null, is_numeric, isset
$null = null;
dump(empty($null)); # $var === null
dump(empty(0)); # $var === 0
dump(empty('')); # $var === ''
dump(empty([])); # count($var) === 0
dump(empty(0.0)); # $var === 0.0
dump(empty(['']));
dump(empty(false)); # $var === false


dump(is_null(null)); # => $var === null
dump(is_null(false));
dump(is_null([]));

dump(is_int(0)); # => (integer)$var = $var
dump(is_int(false));
dump(is_int(null));
dump(is_int(0.0));

dump(is_numeric(0.0)); # (integer)$var = $var or (float)$var = $var
dump(is_numeric(false));
dump(is_numeric([]));
dump(is_numeric(null));
dump(is_numeric('0.0'));
dump(is_numeric(0));
$var = '0.0';
dump(((integer)$var === $var or (float)$var === $var));


dump(isset($bambang)); #(isset($var) === true and $var !== null)
dump(isset($result[6]));
dump(array_key_exists(6, $result));

dump($result);
unset($result['xxx']);
dump($result);

# MATH LIBRARY.
# pow, sin, sqrt, tan, number_format, ceil, floor, log, cos, round.
dump(pow(2,3));
dump(sqrt(4)); # pow(4, 1/2);
dump(pow(8, 3));
dump(pow(8, -3));
dump(pow(2, -1));
dump(round(6.5554, 3));
dump(number_format(1250000.8982, 2,',', '.'));
dump(ceil(5.4));
dump(floor(5.7));

# DATE LIBRARY.
# date, date_diff, date_create, date_create_from_format, date_add, date_sub
