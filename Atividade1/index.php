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
        <form action="jogo.php?page=1" method="POST" enctype="multiplart/form-data">
            <input type="hidden" name="insert" value="insert">
            <label for="nome">Digite seu Nome:</label>
            <input type="text" name="nome" placeholder="Nome">
            <button type="submit">Novo Jogo</button>
        </form>
        <?php
            if (isset( $_SESSION['message'])) {
                echo "<p style='color: #ef5350';>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
        ?>
        <form action="leaderboard.php" method="GET" enctype="multiplart/form-data">
            <button type="submit">Leaderboard</button>
        </form>
    </div>
    <div class="separator">
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>







