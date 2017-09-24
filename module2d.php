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
//session_id('customerA' . time());
session_start();
echo session_id();
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

function getUrlQuery()
{
    $url = 'http://php.net/manual/en/function.urldecode.php?data=5000&field=data bambang adrian';
    $encodedUrl = base64_encode($url);
    $parsedUrl = parse_url($url);
    $parsedQuery = explode('&', $parsedUrl['query']);
    $additionalQueryData = [];
    foreach ($parsedQuery as $data) {
        $explodedData = explode('=', $data);
        $additionalQueryData[$explodedData[0]] = $explodedData[1];
    }
    $urlQueryData = ['id' => 8800, 'name' => 'Product'];
    $mergedUrlQueryData = array_merge($urlQueryData, $additionalQueryData);
    $buildedQuery = http_build_query($mergedUrlQueryData);
    return $buildedQuery;
}

?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?' . getUrlQuery(); ?>">

        <input type="text" name="name" />
        <input type="submit" value="Submit" />
    </form>

<?php
# GLOBAL, URL, request, server, session.
//dump($GLOBALS); # Not-standard
//dump($GLOBALS['_GET']);
//dump($_SERVER);
//dump($_GET);
//dump($_POST);
//dump($_REQUEST); # Not-standard
# Session: session_start, session_destroy, $_SESSION, session_unset, session_id
$_SESSION['lang'] = 'bahasa';
$_SESSION['location'] = 'id';
session_unset();
dump($_SESSION);
$_SESSION['user'] = 'bambang';
$_SESSION['role'] = 'admin';
dump($_SESSION);
unset($_SESSION['user']);
dump($_SESSION);
session_destroy();
# Recursion function
function factorial($n)
{
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

dump(factorial(5)); # 5x4x3x2x1
# Exception.
# 2 Actor: User, System.
# 3 Exception: Runtime, Logical, Error.
function divide($num1, $num2)
{
    try {
        $result = $num1 / $num2;
    } catch (\Exception $ex) {
        dump($ex->getMessage());
    } finally {
        echo 'Thanks to use this divide function';
    }
    return $result;
}

dump(divide(3, 0));
?>