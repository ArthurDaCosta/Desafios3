<?php

session_start();

class Model
{


    static function verifyName()
    {
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
    }

    static function verifyOpcao()
    {
        if(isset($_SESSION['opcao'])) {
            if($_SESSION['question']['correct_answer'] == $_SESSION['opcao']){
                $_SESSION['corretas'] += 1;
            } else{
                $_SESSION['incorretas'] += 1;
            }
   
            
            unset($_SESSION['question']);
            $_SESSION['number']++;
            unset($_SESSION['opcao']);
          //  header("location:jogo.php");
        }
    }

    static function verifyJogo()
    {
        if(isset($_POST['cancel'])) {
            unset($_SESSION['question']);
            var_dump($_SESSION['opcao']);
            unset($_SESSION['opcao']);
            var_dump($_SESSION['opcao']);
        } 
    }
}