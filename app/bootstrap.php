<?php

require_once 'config/main.php';

/*$DB = new PDO('mysql:host=' . $config['db']['host'] . ';'
        . 'dbname=' . $config['db']['dbname'], $config['db']['user'], $config['db']['password']);
*/

require_once 'inc/model.php';
require_once 'inc/view.php';
require_once 'inc/controller.php';
require_once 'inc/route.php';
require_once 'inc/helper.php';

Route::start($DB);
