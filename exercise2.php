<?php
dump($_POST);
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

$date = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));

$message = 'Input Coeg';
if (array_key_exists('name', $_POST) === true) {
    $timezone = new DateTimeZone('Asia/Jakarta');
    $dateBerlin = new DateTime($_POST['name'], $timezone);
    $date = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
    $date2 = DateTime::createFromFormat('Y-m-d', $dateBerlin->format('Y-m-d'), new DateTimeZone('Asia/Jakarta'));
    $dateDiffIntervalObj = $date->diff($date2);
    $diffDate = $dateDiffIntervalObj->format('%r %y years %m months %a days');
    dump($diffDate);
} else {
    echo $message;
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

    <input type="text" name="name" />
    <input type="submit" value="Submit" name="submit" />
</form>
