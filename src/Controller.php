<?php

namespace Src;

class Controller
{
    public $config;

    public $basePath;

    public $isAdmin;

    public function __construct($config = [])
    {
        $this->config = $config;
        $this->basePath = $config['base_path'];
        $this->isAdmin  = Auth::isLoggedIn();
    }

    /**
     * @param string $view
     * @param array $data
     */
    public function view(string $view, array $data = [])
    {
        if (isset($data) && $data) extract($data);

        //including the header, the view and the footer
        require_once '../app/Views/layout/header.phtml';
        require_once '../app/Views/' . $view . '.phtml';
        require_once '../app/Views/layout/footer.phtml';
    }
}