<?php

class Model
{
    static function verifyName()
    {
        if(isset($_POST['name'])) {
            if(trim($_POST['name'])=='') {
                $_SESSION['message'] = "O campo não pode ser vazio.";
                echo '<meta http-equiv="refresh" content="0; url=index.php" />';
                exit;
            } else if(strlen($_POST['name'])>32) {
                $_SESSION['message'] = "O nome não pode ter mais de 32 caracteres.";
                echo '<meta http-equiv="refresh" content="0; url=index.php" />';
                exit;
            } else {
                session_unset();
                $_SESSION['name'] = $_POST['name'];
            }
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

    static function verifyGameCancelled()
    {
        if(isset($_POST['cancel'])) {
            session_unset();
        }  
    }

    static function verifyGameFinished(Database $database)
    {
        if($_SESSION['questionNumber']>5) {
            $player = new Player($_SESSION['name'], $_SESSION['corretas'] ?? 0, $_SESSION['incorretas'] ?? 0);
           
            $database->insert($player);
            session_unset();
        }  
    }
}