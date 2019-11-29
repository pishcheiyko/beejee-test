<?php

return array(
    'project_name' => 'BeeJeeTest',
    'base_path' => 'http://beejee.local/',
    'connection' => array(
        'mysql' => array(
            'dsn'      => 'mysql:host=127.0.0.1;dbname=beejeetest;charset=utf8mb4',
            'username' => 'root',
            'password' => 'root',
            'options'  => array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ),
        )
    )
);