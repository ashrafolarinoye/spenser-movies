<?php

$configfile = 'config.php';
if (!file_exists($configfile)) {
    header('Location: ./install');
    exit();
}

session_start();


require './config.php';
require './functions.php';
require "./strings.php";
require './routes.php';

$urlPath = new Routes();

$connect = connect($database);

// Site Logo

$brand = getBrand($connect);

// Settings

$settings = getSettings($connect);

?>