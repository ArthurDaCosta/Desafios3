<?php

session_start();

require_once __DIR__.'/classes/Question.php';
require_once __DIR__.'/classes/Controller.php';
require_once __DIR__.'/classes/API.php';
require_once __DIR__.'/classes/Router.php';
require_once __DIR__.'/classes/RequestAPI.php';
require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/classes/cadastrar.php';

// verifica nome vazio
if(isset($_POST['name'])) {
    if(trim($_POST['name'])=='') {
        $_SESSION['message'] = "O campo não pode ser vazio.";
        header("location: index.php");
        exit;
    }  
}

$router = new Router();
$router->setMethod($_SERVER['REQUEST_METHOD']);
$router->setRoute($_SERVER['REQUEST_URI']); 

$router->verifyMethod();


$totalPaginas = count($_SESSION['questions']);

if(isset($_GET['page'])){
    $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT)-1;
}

if(!$page||$page<0||$page>$totalPaginas-1){
    $page = 0;
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
    <title>Trivia</title>
    <link rel="shortcut icon" href="favicon/trivia.png" type="image/x-icon">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Trivia</h1>
    </div>
    <div class="form">
        
    </div>
    <div class="separator">
    </div>
    <div class="header">
        <h1>Options</h1>
    </div>
    <div class="list-options">
        <?php
        echo "<ul>";
       echo "<form method=POST action=cadastrar.php></form>";
        echo  $_SESSION['questions'][$page]['question'] . "</li>";
        $shuffle = shuffle($_SESSION['questions'][$page]['answers']);
        foreach ($_SESSION['questions'][$page]['answers'] as $answer) {

//botões de rádio (radio buttons). 
//caixas de seleção (checkbox)    
     echo "<ul><input type=radio name=opcao value=$answer>".$answer."</ul>";
 }  

      /*
      original:  echo "<li><input type=button value=".$answer." onClick=></li>";
      <input type="radio" name="citizenship" />
 */
echo "<div class=salvar>";
//echo "<input type=button value=Salvar Tentativa onClick= >";

echo "<input type=submit value=Salvar_Tentativa>";
echo "</div>";


        echo "</ul>";
        ?>
        
    </div>
    <div class="pagination_section">
        <?php
            if($page>0){
                var_dump($opcao);
                echo "<nobr><a href='?page=" . $page . "'> << Anterior </a>";
            } else {var_dump($opcao);
                echo "<nobr><a style='visibility: hidden'> << Anterior </a>";
            }
         /*   foreach ($_SESSION['questions'] as $key => $value) {
                if($key==$page){
                    $verifyActive= "active";
                } else{
                    $verifyActive= "noactive";
                }
                echo "<a href='?page=" . ($key+1) . "' class='$verifyActive'>" . ($key+1) . "</a>";
            }
            if($page<$totalPaginas-1){
                echo "<a href='?page=" . ($page+2) . "'>Próxima >></a></nobr>";
            }  else {
                echo "<a style='visibility: hidden';>Próxima >></a></nobr>";
            }   */

        ?>
    </div>
    <!-- <div class="salvar">
        <input type="button" value="Salvar Tentativa" onClick=" "> 
    </div>-->
    <div class="voltar">
        <input type="button" value="Terminar" onClick="$_SESSION['terminar']=1"> 
    </div>
    <div class="home">
         <form action="index.php" method="GET" enctype="multiplart/form-data"> 
            <input  type="submit" value=Home >
       <!--     <input type="button" value="Home" onClick="index.php" method="GET"> teste deletar-->


        </form>
    </div>

      <!--  <input type="button" value="Voltar" onClick="header:Location:index.php">  -->
    </div>
    <div class="footer">
        <p>Desenvolvido por</p>
    </div>
</div>
