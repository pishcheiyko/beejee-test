<?php

namespace App\Controllers;

use App\Entities\Admin;
use Src\Auth;
use Src\Controller;

class AdminController extends Controller
{
    /**
     * Login page for admin
     */
    public function login()
    {
        if (!$this->isAdmin) {
            if (isset($_POST['login'])) {
                $admin  = new Admin($this->config);
                if ($adminId = $admin->logIn($_POST['login'], $_POST['password'])) {
                    $auth = new Auth();
                    $auth->createAuth($adminId);
                    header('location: ' . $this->config['base_path']);
                } else {
                    $errorMessage = "Incorrect login or password";
                }
            }

            // load views.
            $this->view('admin/login', [
                'errorMessage' => $errorMessage ?? null
            ]);
        } else {
            header('location: ' . $this->config['base_path']);
        }
    }

    /**
     * Logout admin page action
     */
    public function logout()
    {
        if ($this->isAdmin) {
            $auth = new Auth();
            $auth->deleteAuth();
        }

        header('location: ' . $this->config['base_path']);
    }

}