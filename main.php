<!DOCTYPE html>
<html>

<head>
    <title>Асортимент Сумної</title>
    <meta charset="utf-8">
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $a = '/mnt/f/sumna/main.json';
    $json = file_get_contents($a);
    $obj = json_decode($json, true);
    "<pre>" . print_r($obj) . "</pre>";
    ?>
</body>

</html>