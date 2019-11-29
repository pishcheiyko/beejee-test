<?php

namespace Src;

class Route
{
    /**
     * @var array
     */
    private $_uri = array();
    /**
     * @var array
     */
    private $_method = array();
    /**
     * @var array
     */
    public $config;

    /**
     * Route constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * Add route to route list
     * @param $uri
     * @param null $method
     */
    public function add($uri, $method = null)
    {
        $segments = explode('/', $uri);
        foreach ($segments as &$segment){
            $pos = strpos($segment, ':');
            if($pos !== false){
                $segmentName = str_replace(':', '', $segment);
                $segment = str_replace(":$segmentName", "(?<$segmentName>.*)", $segment);
            }
        }
        $uri = implode('/', $segments);
        $this->_uri[] = (!$_GET['uri']) ? '/' . trim($uri, '/') : trim($uri, '/');

        if($method != null){
            $this->_method[] = $method;
        }
    }

    /**
     * build and register all routes
     */
    public function submit()
    {
        $uriGetParam = isset($_GET['uri']) ? $_GET['uri'] : '/';
        foreach ($this->_uri as $key => $value){

            if(preg_match("#^$value$#", $uriGetParam, $matches))
            {
                if(is_string($this->_method[$key]))
                {
                    $partials = explode('@', $this->_method[$key]);
                    $classController = 'App\\Controllers\\' . $partials[0];
                    $controller = new $classController($this->config);
                    $action = $partials[1];
                    $returnValue = [];
                    foreach ($matches as $k => $v) {
                        if (!is_int($k)) {
                            $returnValue[$k] = $v;
                        }
                    }
                    extract($returnValue);
                    if(isset($id)){
                        $controller->$action($id);
                    }else {
                        $controller->$action();
                    }

                }
                else
                {
                    call_user_func($this->_method[$key]);
                }

            }
        }
    }
}