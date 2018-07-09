<?php
ini_set('display_errors', 1);

require_once(__DIR__ . '/vendor/autoload.php');

$config = require_once ('app/config/main.php');
$app = new Mad\App ($config);

$app->run();

function d($params) {
    echo '<pre  style="border:1px solid red;">';
        var_dump($params);
    echo '</pre>';

    die;
}
