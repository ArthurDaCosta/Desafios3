<?php

class API
{
    public string $url;
    public string $amount;

    function setUrl($url)
    {
        $this->url = $url;
    }

    function getUrl()
    {
        return $this->url;
    }

    function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    function getAmount()
    {
        return $this->amount;
    }
}