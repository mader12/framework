<?php

ini_set('display_errors', 1);


require_once(__DIR__ . '/vendor/autoload.php');
//require_once(__DIR__ . '/vendor/mader12/mad-frm/src/Mad.php');

//$a = new Mad();

//d($a);
d(class_exists('Mad\\App'));
        
function d($params) {
    echo '<pre  style="border:1px solid red;">';
        var_dump($params);
    echo '</pre>';

    die;
}
