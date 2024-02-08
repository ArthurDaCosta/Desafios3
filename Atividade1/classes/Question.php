<?php

class Question
{
    public string $type;
    public string $difficulty;
    public string $category;
    public string $question;
    public string $correct_answer;
    public $incorrect_answers;
    public $answers;

    function setCategory($category)
    {
        $this->category = $category;
    }

    function getCategory()
    {
        return $this->category;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function getType()
    {
        return $this->type;
    }

    function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    function getDifficulty()
    {
        return $this->difficulty;
    }

    function setQuestion($question)
    {
        $this->question = $question;
    }

    function getQuestion()
    {
        return $this->question;
    }

    function setCorrectAnswer($correct_answer)
    {
        $this->correct_answer = $correct_answer;
    }

    function getCorrectAnswer()
    {
        return $this->correct_answer;
    }

    function setIncorrectAnswers($incorrect_answers)
    {
        $this->incorrect_answers = $incorrect_answers;
    }

    function getIncorrectAnswers()
    {
        return $this->incorrect_answers;
    }

    function setAnswers($answers, $correct_answer)
    {
        $answers[] = $correct_answer;
        $this->answers = $answers;
    }

    function getAnswers()
    {
        return $this->answers;
    }
}