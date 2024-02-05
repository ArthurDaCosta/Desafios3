<?php

session_start();

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
        <h1>Leaderboard</h1>
    </div>
    <div class="separator">
    </div>
    <div class="list-names">
        <?php
            echo "<ul>";
            echo "<ui> Names:</ui>";
            echo "<ul>";
        ?>
    </div>
    <div class="voltar">
        <input type="button" value="Voltar" onClick="history.go(-1)"> 
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>