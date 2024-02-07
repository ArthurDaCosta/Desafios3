<?php

session_start();

$_SESSION['names'] = ['re', 'teste2'];
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

<div class="container">
    <div class="header">
        <h1>Partidas</h1>
    </div>
    <div class="separator">
    </div>
    <div class="nobr">
        <?php
            echo "<ut> Nomes:</ut>";
            echo "<ui> Questões:</ui>";
            echo "<ui> Certas:</ui>";
            echo "<ui> Erradas:</ui>";
        ?>
    </div>
    <!--   -->   
        <table>
        <tr>
            <th>Nomes</th>
            <th>Questões</th>
            <th>Certas</th>
            <th>Erradas</th>
        </tr>
        <tr>
            <td>Dados 'nome'</td>
            <td>Dados 'questoes'</td>
            <td>Dados 'certas'</td>
            <td>Dados 'erradas'</td>
        </tr>

    </table>
    <div class="separator-vertical">
    </div>
    <div class="separator">
    </div>
    <div class="list-games">
        <div class="name">
            <?php
                foreach ($_SESSION['names'] as $name) {
                    echo "<ui> $name</ut><br>";
                }
            ?>
        </div>
        <div class="questions">
            <?php
                foreach ($_SESSION['names'] as $name) {;
                    echo "<ui> $_SESSION[questions]</ui><br>";
                }
            ?>
        </div>
        <div class="correct">
            <?php
                foreach ($_SESSION['names'] as $name) {
                    echo "<ui> $_SESSION[correct]</ui><br>";
                }
            ?>
        </div>
        <div class="incorrect">
            <?php
                foreach ($_SESSION['names'] as $name) {
                    echo "<ui> $_SESSION[incorrect]</ui><br>";
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