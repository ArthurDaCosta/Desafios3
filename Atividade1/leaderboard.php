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
//passar as informações das colunas e linhas...
        ?>
<?php
echo "<ut> Nomes</ut>";
echo "<ui> Questões</ui>";
echo "<ui> Certas</ui>";
echo "<ui> Erradas</ui>";
?>
 
    </div>
    </nobr>
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
    <div class="separator">
    </div>
    <div class="list-names">
        <?php
            echo "<ui> Names:</ui>";
        ?>
    
    </div>
    

    <div>
        <form action=index.php method=POST enctype=multiplart/form-data>
        <div class="salvar">
            <input type=submit value=Home action=leaderboard.php method=POST >
        </div>
    </div>
    <!---->
   
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>