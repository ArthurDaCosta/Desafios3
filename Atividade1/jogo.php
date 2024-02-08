<?php

session_start();

require_once __DIR__.'/classes/Question.php';
require_once __DIR__.'/classes/Controller.php';
require_once __DIR__.'/classes/API.php';
require_once __DIR__.'/classes/Router.php';
require_once __DIR__.'/classes/RequestAPI.php';
require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/classes/Model.php';
require_once __DIR__.'/classes/Player.php';

Model::verifyName();   
Model::verifyOpcao();

$database = new Database;
$database->makeConnection();
$database->createTables();

$router = new Router();
$router->setMethod($_SERVER['REQUEST_METHOD']);
$router->setRoute($_SERVER['REQUEST_URI']); 

$router->verifyMethod($database);

if (!isset($_SESSION['questionNumber'])){
    $_SESSION['questionNumber'] = 1;
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <META NAME="viewport" content="width=device-width, initial-scale=10">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon/trivia.png" type="image/x-icon"> 
    <title>Trivia</title>
 
</head>

<body>
<div class="container">
    <div class="header">
        <h1>Trivia</h1>
    </div>
    <div class="separator">
    </div>
    <div class="question">
        <?php
            echo  "<ut>". $_SESSION['questionNumber'] . " - " . $_SESSION['question']['question'] . "</ut>";
        ?>
    </div>
    <div class="separator">
    </div>
    <?php
        if($_SESSION['questionNumber'] < 5) 
        {
            $action = "jogo.php";
            $text = "Próxima Pergunta";
        } else {
            $action = "leaderboard.php";
            $text = "Terminar Jogo";
        }
    
    echo "<form action='$action' method=post>";
    ?>
        <div class="list-options">
            <?php
            foreach ($_SESSION['question']['answers'] as $answer) {
                echo "<ul><input type=radio name=opcao value='$answer'>$answer</ul>";
            }
            ?>
        </div>
        <div class=salvar>
            <?php
            echo "<input type=submit id=botao value='$text' disabled>";
            ?>
        </div>
    </form>
    <script>
        var contador = 0;

        function iniciarContador() {
            contador = 0;
            document.getElementById('botao').disabled = true; 
            var intervalo = setInterval(function() {
                contador++;
                if (contador > 5) {
                    clearInterval(intervalo);
                    document.getElementById('botao').disabled = false;
                }
            }, 1000);
        }

        window.onload = function() {
            iniciarContador(); 
        };
    </script>
    <form action=index.php method=POST enctype=multiplart/form-data>
        <div class="salvar">
        <input type=submit name=cancel value='Cancelar Jogo' method=POST >
        </div>
    </form>
    <form action=index.php method=POST enctype=multiplart/form-data>
        <div class="salvar">
            <input type=submit value=Home method=POST >
        </div>
    </form>
    <div class="separator">
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>
