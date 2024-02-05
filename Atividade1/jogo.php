<?php

session_start();

require_once __DIR__.'/classes/Question.php';
require_once __DIR__.'/classes/Controller.php';
require_once __DIR__.'/classes/API.php';
require_once __DIR__.'/classes/Router.php';
require_once __DIR__.'/classes/RequestAPI.php';
require_once __DIR__.'/classes/Database.php';

$router = new Router();
$router->setMethod($_SERVER['REQUEST_METHOD']);
$router->setRoute($_SERVER['REQUEST_URI']); 

$router->verifyMethod();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <META NAME="viewport" content="width=device-width, intial-scale=10">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <title>Trivia</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Trivia</h1>
    </div>
    <div class="form">
        
    </div>
    <div class="separator">
    </div>
    <div class="header">
        <h1>Options</h1>
    </div>
    <div class="list-options">
        <?php
        foreach ($_SESSION['questions'] as $question) {
            echo "<ul>";
            echo "<li>" . $question->getQuestion() . "</li>";
            $shuffle = shuffle($question->answers);
            foreach ($question->getAnswers() as $answer) {
                echo "<li>" . $answer . "</li>";
            }
            echo "<ul>";
        }
        ?>
        
    </div>
    <div class="voltar">
        <input type="button" value="Voltar" onClick="history.go(-1)"> 
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>