<?php
namespace Utils\api\Server;


class Server
{

    public $method;
    public $controller;

    private $getMethod;
    private $postMethod;
    private $putMethod;
    private $deleteMethod;

    function __construct($controller)
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->controller = $controller;
    }
    function get($callback)
    {
        $this->getMethod = $callback;
        return $this;
    }
    function post($callback)
    {
        $this->postMethod = $callback;
        return $this;
    }
    function put($callback)
    {
        $this->putMethod = $callback;
        return $this;
    }
    function delete($callback)
    {
        $this->deleteMethod = $callback;
        return $this;
    }

    public function start()
    {
        if ($this->method == "GET" && $this->getMethod != null)
            call_user_func($this->getMethod, $this);
        else if ($this->method == "POST" && $this->postMethod != null)
            call_user_func($this->postMethod, $this);
        else if ($this->method == "PUT" && $this->putMethod != null)
            call_user_func($this->putMethod, $this);
        else if ($this->method == "delete" && $this->deleteMethod != null)
            call_user_func($this->deleteMethod, $this);
    }



}