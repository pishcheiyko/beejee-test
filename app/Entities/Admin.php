<?php

namespace App\Entities;

use Src\Model;

class Admin extends Model
{
    /**
     * Login a admin
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public function logIn(string $login, string $password)
    {
        return ($login == 'admin' && $password == '123') ? 1 : false;
    }
}