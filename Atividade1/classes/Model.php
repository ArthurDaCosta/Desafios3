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

            $_SESSION['name'] = $_POST['name'];
        }
    }

    static function verifyOpcao()
    {
        if(isset($_POST['opcao'])) {
            if($_SESSION['question']['correct_answer'] == $_POST['opcao']){
                $_SESSION['corretas'] += 1;
            } else{
                $_SESSION['incorretas'] += 1;
            }

            
            unset($_SESSION['question']);
            $_SESSION['questionNumber'] += 1;
        }
    }

    static function verifyJogo()
    {
        if(isset($_POST['cancel'])) {
            session_unset();
        }  
    }
}