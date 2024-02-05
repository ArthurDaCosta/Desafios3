<?php

class Controller
{
    static function getQuestions()
    {
        $teste = ['multiple', 'boolean'];
        $teste2 = ['easy', 'medium', 'hard'];

        $_GET['amount'] = '5';
        $_GET['category'] = rand(9, 32);
        $_GET['type'] = $teste[array_rand($teste)];
        $_GET['difficulty'] = $teste2[array_rand($teste2)];

        $api = new API();
        $api->setAmount($_GET['amount']);
        $api->setCategory($_GET['category']);
        $api->setDifficulty($_GET['difficulty']);
        $api->setType($_GET['type']);
        $api->setUrl("https://opentdb.com/api.php?amount=".$api->getAmount()."&category=".$api->getCategory()."&difficulty=".$api->getDifficulty()."&type=".$api->getType()."");

        $url = $api->url;
        $response = RequestAPI::request($url);

        $questions = [];
        foreach ($response['results'] as $result) {
            $question = new Question();
            $question->setCategory($result['category']);
            $question->setType($result['type']);
            $question->setDifficulty($result['difficulty']);
            $question->setQuestion($result['question']);
            $question->setCorrectAnswer($result['correct_answer']);
            $question->setIncorrectAnswers($result['incorrect_answers']);
            $question->setAnswers($result['incorrect_answers'], $result['correct_answer']);
            $questions[] = $question;
        }

        
        $_SESSION['questions'] = $questions;
    }
}

