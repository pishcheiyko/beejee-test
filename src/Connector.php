<?php

namespace Src;

use PDO;

class Connector {
    /**
     * @var Connection
     */
    private $configuration;

    /**
     * Connection constructor.
     * @param Connection $config
     */
    public function __construct(Connection $config)
    {
        $this->configuration = $config;
    }

    public function getConnection()
    {
        return (
            new PDO(
                $this->configuration->getDSN(),
                $this->configuration->getUsername(),
                $this->configuration->getPassword(),
                $this->configuration->getOptions()
            )
        );
    }
}