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
    <link rel="shortcut icon" href="favicon/trivia.png" type="image/x-icon"> 
    <title>Trivia</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Trivia</h1>
    </div>
    <div class="form">
        <form action="redirectGame.php" method="POST" enctype="multiplart/form-data">
            <input type="hidden" name="insert" value="insert">
            <label for="name">Digite seu Nome:</label>
            <input type="text" name="name" placeholder="Nome">

            <?php
            if (isset( $_SESSION['message'])) {
                echo "<p style='color: #ef5350';>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
            ?>

            <button type="submit">Novo Jogo</button>
        </form>
        <?php
        if (isset($_SESSION['question'])) {
            echo "<form action=redirectGame.php method=POST enctype=multiplart/form-data>
            <button type=submit>Continuar Jogo</button>
            </form>";
        }
        ?>

        <form action="redirectMatches.php" method="POST" enctype="multiplart/form-data">
            <button type="submit">Partidas</button>
        </form>
    </div>
    <div class="separator">
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur e Ana</p>
    </div>
</div>