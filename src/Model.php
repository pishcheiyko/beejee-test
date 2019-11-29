<?php

namespace Src;

class Model {

    /**
     * @var null
     */
    public $db = null;
    /**
     * @var
     */
    protected $config;

    public function __construct($config)
    {
        $this->config = $config['connection']['mysql'];
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /**
     * Open the database connection with the credentials from config/app.php
     */
    private function openDatabaseConnection()
    {
        extract($this->config);
        $config = new Connection($dsn, $username, $password, $options);
        $connection = new Connector($config);
        $this->db = $connection->getConnection();
    }
}