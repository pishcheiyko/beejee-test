<?php

session_start();

if (isset($_SERVER) && isset($_SERVER['REMOTE_ADDR']))
{
    $config = __DIR__.'/../config/app.php';
    $config = file_exists($config) ? require_once($config) : [];
}

require __DIR__.'/../vendor/autoload.php';

$app = new Src\Application($config);