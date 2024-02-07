<?php

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
          
            unset($_SESSION['questions']); 
        }
    }

    static function verifyOpcao()
    {
        if(isset($_POST['opcao'])) {
            if($_SESSION['questions'][$_SESSION['questionNumber']]['correct_answer'] == $_POST['opcao']){
                $_SESSION['corretas'] += 1;
            } else{
                $_SESSION['incorretas'] += 1;
            }
        }
    }
}