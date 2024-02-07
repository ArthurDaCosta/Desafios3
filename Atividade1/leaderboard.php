<?php

session_start();

$_SESSION['names'] = ['.', 'teste2'];
$_SESSION['questions'] = 5;
$_SESSION['correct'] = 3;
$_SESSION['incorrect'] = 2;

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
    <link rel="shortcut icon" href="favicon/trivia.png" type="image/x-icon"> 
    <title>Trivia</title>
</head>
<body>

<div class="container-lista">
    <div class="header">
        <h1>Partidas</h1>
    </div>
    <div class="separator">
    </div>
  
  <div class="container-lista">
    <div class="header">
        <h1>Partidas</h1>
    </div>
    <div class="separator">
    </div>
    <div class="list-games">
        <div class="container-name">
            <h2>Nome</h2>
             <div class="separator">
            </div>
            <?php
                foreach ($_SESSION['names'] as $name) {
                    echo "<div class=name>";
                    echo "<ui> $name</ui>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="container-correct">
            <h2>Corretas</h2>
            <div class="separator">
            </div>
            <?php
                foreach ($_SESSION['names'] as $name) {
                    echo '<div class="correct">';
                    echo "<ui> $_SESSION[correct]</ui><br>";
                    echo '</div>';
                }
            ?>
        </div>
        <div class="container-incorrect">
            <h2>Incorretas</h2>
            <div class="separator">
            </div>
            <?php
                foreach ($_SESSION['names'] as $name) {
                    echo '<div class="incorrect">';
                    echo "<ui> $_SESSION[incorrect]</ui><br>";
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <div>
        <form action=index.php method=POST enctype=multiplart/form-data>
        <div class="salvar">
            <input type=submit value=Home action=leaderboard.php method=POST >
        </div>
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>