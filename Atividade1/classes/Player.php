<?php

class Player {
    public string $name;
    public int $correct;
    public int $incorrect;

    function __construct(string $name, int $correct, int $incorrect)
    {
        $this->name = $name;
        $this->correct = $correct;
        $this->incorrect = $incorrect;
    }
}