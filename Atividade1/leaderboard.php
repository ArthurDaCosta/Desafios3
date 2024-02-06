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
        <h1>Partidas</h1>
    </div>
    <div class="separator">
    </div>
    <nobr>
    <div class="nobr">
        <?php
            echo "<ut> Nomes:</ut>";
            echo "<ui> Questões:</ui>";
            echo "<ui> Certas:</ui>";
            echo "<ui> Erradas:</ui>";
        ?>
    </div>
    </nobr>
    <div class="separator">
    </div>
    <div class="list-names">
        <?php
            echo "<ui> Names:</ui>";
        ?>
    </div>
    <div class="home">
         <form action="index.php" method="POST" enctype="multiplart/form-data"> 
            <input  type="submit" value=Home >
        </form>
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>