<?php

class API
{
    public string $url;
    public string $amount;
    public string $category;
    public string $difficulty;
    public string $type;

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

    function setCategory($category)
    {
        $this->category = $category;
    }

    function getCategory()
    {
        return $this->category;
    }

    function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    function getDifficulty()
    {
        return $this->difficulty;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function getType()
    {
        return $this->type;
    }
}