<?php

class Player {
    private string $name;
    private string $score;

    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function setScore($score)
    {
        $this->score = $score;
    }

    function getScore()
    {
        return $this->score;
    }   
}