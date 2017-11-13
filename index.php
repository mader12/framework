<?php

session_start();
$user = !empty($_SESSION['user']) ? $_SESSION['user'] : '';
session_write_close();
ini_set('display_errors', 1);
require_once 'app/bootstrap.php';
