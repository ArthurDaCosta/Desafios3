<?php

session_start();

require_once __DIR__.'/classes/Question.php';
require_once __DIR__.'/classes/Controller.php';
require_once __DIR__.'/classes/API.php';
require_once __DIR__.'/classes/Router.php';
require_once __DIR__.'/classes/RequestAPI.php';
require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/classes/cadastrar.php';

if(isset($_POST['name'])) {
    if(trim($_POST['name'])=='') {
        $_SESSION['message'] = "O campo não pode ser vazio.";
        header("location: index.php");
        exit;
    } 
    
    if(strlen($_POST['name'])>32) {
        $_SESSION['message'] = "O nome não pode ter mais de 32 caracteres.";
        header("location: index.php");
        exit;
    } 
}

//verificar se alternativa foi selecionada
/* 
if(isset($_POST['opcao'])) {
    if(trim($_POST['opcao'])=='') {
        $_SESSION['message'] = "A alternativa não pode estar vazio.";
       // header("location: index.php");
        exit;
    }  
     var_dump($opcao);
}
*/

$router = new Router();
$router->setMethod($_SERVER['REQUEST_METHOD']);
$router->setRoute($_SERVER['REQUEST_URI']); 

$router->verifyMethod();


$totalPaginas = count($_SESSION['questions']);

if(!$number){
    $number = 0;
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

<div class="container">
    <div class="header">
        <h1>Trivia</h1>
    </div>
    <div class="form">
        <!--descrição-->
    </div>
    <div class="separator">
    </div>
    <div class="header">
        <h1>Opções</h1>
    </div>
    <div class="list-options">
        <?php
        echo "<ul>";
         echo "<form method=POST action=cadastrar.php>";
        echo  $_SESSION['questions'][$number]['question'] . "</li>";
        foreach ($_SESSION['questions'][$number]['answers'] as $answer) {

            //botões de rádio (radio buttons). 
            //caixas de seleção (checkbox)    
             echo "<ul><input type=radio name=opcao value=$answer>".$answer."</ul>";
        }  
        echo "</form>";
         /*
        original:  echo "<li><input type=button value=".$answer." onClick=></li>";
        <input type="radio" name="citizenship" />
        */
       // echo "<div class=salvar>";
        //echo "<input type=button value=Salvar Tentativa onClick= >";

      //  echo "<input type=submit value=SalvarTentativa>";
       // echo "</div>";
        echo "</ul>";
        ?>
        
    </div>

    <?php
            if($number>0){
                var_dump($opcao);
                //echo "<nobr><a href='?page=" . $page . "'> << Anterior </a>";
            } else {
                var_dump($opcao);
              //  echo "<nobr><a style='visibility: hidden'> << Anterior </a>";
            }

        ?>
     <div class="salvar">
        <input type="button" value="Salvar Tentativa" onClick=" "> 
    </div>
    <div class="voltar">
        <input type="button" value="Terminar" onClick="$_SESSION['terminar']=1"> 
    </div>

    <div>
        <form action=index.php method=POST enctype=multiplart/form-data>
        <div class="salvar">
            <input type=submit value=Home action=leaderboard.php method=POST >
        </div>
    </div>

  <?php
    echo "<div class=voltar>";
        echo "<form action=index.php method=POST >";
  

     // echo "<form action=jogo.php?page=1 method=POST enctype=multiplart/form-data>";
         //  echo "<button type=submit>Novo Jogo</button>r-->

        echo"</form>";
        
    echo "</div>";
?>
      <!--  <input type="button" value="Voltar" onClick="header:Location:index.php">  -->
    
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>
