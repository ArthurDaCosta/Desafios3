<?php

class Router
{
    private $method;
    private $route;

    function getMethod()
    {
        return $this->method;
    }

    function setMethod($method)
    {
        $this->method = $method;
    }

    function getRoute()
    {
        return $this->route;
    }

    function setRoute($route)
    {
        $this->route = $route;
    }

    function verifyMethod()
    {
        http_response_code(200);

        if (!isset($_SESSION['question'])){
            Controller::getQuestions(); 
        } 
       /* if ($this->getMethod() === 'POST') {
            if (!isset($_SESSION['question'])){
                Controller::getQuestions(); 
            } 
        } */  
    }
}

