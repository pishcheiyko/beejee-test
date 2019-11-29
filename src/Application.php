<?php

namespace Src;

class Application {

    public function __construct($config)
    {
        $route = new Route($config);
        $route->add('/', 'FrontendController@index');
        $route->add('/admin', 'AdminController@login');
        $route->add('/admin/login', 'AdminController@login');
        $route->add('/admin/logout', 'AdminController@logout');
        $route->add('/task/edit/:id', 'FrontendController@edit');
        $route->add('/task/edit', 'FrontendController@edit');
        $route->add('/task/add', 'FrontendController@add');
        $route->submit();
    }
}