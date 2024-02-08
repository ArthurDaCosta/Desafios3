<?php

class Controller
{
    static function getQuestions(Database $database)
    {

        $api = new API();
        $api->setAmount('1'); 
        $api->setUrl("https://opentdb.com/api.php?amount=".$api->getAmount()."");

        $url = $api->url;
        $response = RequestAPI::request($url);
        if($response === null){
            $response['database'] = $database->getAll('question');
            shuffle($response['database']);
            $response['results'][]=$response['database'][rand(0, count($response['database'])-1)];
        }

        foreach ($response['results'] as $result) {
            $question = new Question();
            $question->setCategory($result['category']);
            $question->setType($result['type']);
            $question->setDifficulty($result['difficulty']);
            $question->setQuestion($result['question']);
            $question->setCorrectAnswer($result['correct_answer']);
            $question->setIncorrectAnswers($result['incorrect_answers']);
            if(isset($result['answers'])){
                $question->answers=json_decode($result['answers']);
            } else {
                $question->setAnswers($result['incorrect_answers'], $result['correct_answer']);
            }
            shuffle($question->answers);
        }
        
        $_SESSION['question'] = get_object_vars($question);
        $questionFromDB = $database->getOne('question', "question = '$question->question'");
        if($question->question!=$questionFromDB[0]['question'])
        {
            $question->incorrect_answers=json_encode($question->incorrect_answers);
            $question->answers=json_encode($question->answers);
            $database->insert($question);
        }
    }
}

