<?php

namespace Src;

class Connection
{
    /**
     * @var string
     */
    private $dsn;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $options;

    /**
     * Class construct
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     */
    public function __construct(string $dsn, string $username, string $password, array $options)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options  = $options;
    }

    /**
     * @return string
     */
    public function getDSN(): string
    {
        return $this->dsn;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}