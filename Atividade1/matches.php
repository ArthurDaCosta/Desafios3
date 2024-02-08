<?php

session_start();

require_once 'classes/Database.php';

$database = new Database();
$database->makeConnection();

var_dump($_SESSION['name']);
var_dump($_SESSION['corretas']);
var_dump($_SESSION['incorretas']);
var_dump($_SESSION['questionNumber']);

$matches = $database->getAll('player') ;
if (empty($matches)) {
    $matches = [];
}

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
 
    <div class="list-games">
        <div class="container-name">
            <h2>Nome</h2>
             <div class="separator">
            </div>
            <?php
                foreach ($matches as $match) {
                    echo "<div class=name>";
                    echo "<ui>".$match['name']."</ui>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="container-correct">
            <h2>Corretas</h2>
            <div class="separator">
            </div>
            <?php
                foreach ($matches as $match) {
                    echo '<div class="correct">';
                    echo "<ui>".$match['correct']."</ui><br>";
                    echo '</div>';
                }
            ?>
        </div>
        <div class="container-incorrect">
            <h2>Incorretas</h2>
            <div class="separator">
            </div>
            <?php
                foreach ($matches as $match) {
                    echo '<div class="incorrect">';
                    echo "<ui>".$match['incorrect']."</ui><br>";
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <div>
        <form action=redirectIndex.php method=POST enctype=multiplart/form-data>
        <div class="salvar">
            <input type=submit value=Home method=POST >
        </div>
    </div>
    <div class="separator">
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>