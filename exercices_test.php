<!doctype html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../css/basic.css" />
    <style>

    </style>
</head>
<body>
<table border="1" style="">
    <thead>
    <tr>
        <?php
        $baris = 5;
        for ($counter = 1; $counter <= $baris; $counter++) {
            echo '<th>' . $counter . '</th>';
        }
        ?>
    </tr>
    <tr>
        <?php
        for ($counter = 1; $counter <= $baris; $counter++) {
            echo '<th>' . $counter * 2 . '</th>';
        }
        ?>
    </tr>
    <tr>
        <?php
        for ($counter = 1; $counter <= $baris; $counter++) {
            echo '<th>' . $counter * 3 . '</th>';
        }
        ?>
    </tr>
    <tr>
        <?php
        for ($counter = 1; $counter <= $baris; $counter++) {
            echo '<th>' . $counter * 4 . '</th>';
        }
        ?>
    </tr>
    <tr>
        <?php
        for ($counter = 1; $counter <= $baris; $counter++) {
            echo '<th>' . $counter * 5 . '</th>';
        }
        ?>
    </tr>
    </thead>
</table>
<br />

</body>
</html>