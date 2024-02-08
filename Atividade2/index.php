<?php

require_once 'classes/Projetos.php';
require_once 'classes/Tarefas.php';
require_once 'classes/Usuarios.php';
require_once 'classes/Atribuicoes.php';
require_once 'classes/Database.php';

$database = New Database();
$database->makeConnection();
$database->createTables();

$exit = false;
while ($exit==false)
{
    echo "\n[1] - Cadastrar Projeto\n";
    echo "[2] - Cadastrar Tarefa\n";
    echo "[3] - Cadastrar Usuário\n";
    echo "[4] - Atribuir Tarefa\n";
    echo "[5] - Listar Projetos\n";
    echo "[6] - Listar Tarefas\n";
    echo "[7] - Listar Usuários\n";
    echo "[8] - Listar Atribuições\n";
    echo "[9] - Sair\n";
    $escolha = (int) readline("Escolha: ");

    switch($escolha)
    {
        case 1:

            echo "\n    Cadastrar Projeto: \n";
            $projeto = new Projetos();
            $projeto->nome = readline("Nome do projeto: ");
            $projeto->descricao = readline("Descrição do projeto: ");
            $projeto->data_inicio = readline("Data de início do projeto(Ano/Mês/Dia): ");
            $projeto->data_fim = readline("Data de fim do projeto(Ano/Mês/Dia): ");
            $database->insert($projeto);
            break;
        case 2:

            echo "\n    Cadastrar Tarefa: \n";
            $tarefa = new Tarefas();
            $tarefa->descricao = readline("Descrição da tarefa: ");
            if ($database->getOne("Projetos", $idProjeto = readline("ID do Projeto: ")))
            {
                $tarefa->project_id = $idProjeto;
            } else {
                echo "Projeto não encontrado.\n";
                break;
            }
            $tarefa->data_inicio = readline("Data de início da tarefa(Ano/Mês/Dia): ");
            $tarefa->data_fim = readline("Data de fim da tarefa(Ano/Mês/Dia): ");
            $database->insert($tarefa);
            break;
        case 3:

            echo "\n    Cadastrar Usuário: \n";
            $usuario = new Usuarios();
            $usuario->nome = readline("Nome do usuário: ");
            $validar = false;
            while($validar == false){
            $email = readline("E-mail do usuário: ");
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $usuario->email = $email;
                    $validar = true;
                } else {
                    echo "Formato de e-mail inválido!\n";
                }
            }
            $database->insert($usuario);
            break;
        case 4:

            echo "\n    Atribuir Tarefas: \n";
            $atribuicao = new Atribuicoes();
            echo "\n";
            if ($database->getOne("Usuarios", $idUsuario = readline("ID do Usuário: ")))
            {
                $atribuicao->usuario_id = $idUsuario;
            } else {
                echo "Usuário não encontrado.\n";
                break;
            }

            if ($database->getOne("Tarefas", $idTarefa = readline("ID da tarefa: ")))
            {
                $atribuicao->tarefa_id = $idTarefa;
            } else {
                echo "Tarefa não encontrada.\n";
                break;
            }

            $database->insert($atribuicao);
            break;
        case 5:

            echo "\n    Listar Projetos: \n";
            $array = $database->getAll("Projetos");

            echo "\n";
            if ($array == false)
            {
                echo "Nenhum Projeto cadastrado\n";
                break;
            } 

            foreach ($array as $object)
            {
                foreach ($object as $key=>$value)
                {
                    echo ucfirst($key)." = $value\n";
                }   
                echo "\n";
            }
            break;

        case 6:

            echo "\n    Listar Tarefas: \n";
            $array = $database->getAll("Tarefas");

            echo "\n";
            if ($array == false)
            {
                echo "Nenhuma Tarefa cadastrada\n";
                break;
            } 

            foreach ($array as $object)
            {
                foreach ($object as $key=>$value)
                {
                    echo ucfirst($key)." = $value\n";
                }   
                echo "\n";
            }
            break;
        case 7:

            echo "\n    Listar Usuários: \n";
            $array = $database->getAll("Usuarios");

            echo "\n";
            if ($array == false)
            {
                echo "Nenhum usuário cadastrado.\n";
                break;
            } 

            foreach ($array as $object)
            {
                foreach ($object as $key=>$value)
                {
                    echo ucfirst($key)." = $value\n";
                }   
                echo "\n";
            }
            break;
        case 8:

            echo "\n    Listar Atribuições: \n";
            $array = $database->getAll("Atribuicoes");

            echo "\n";
            if ($array == false)
            {
                echo "Nenhuma Atribuição cadastrada.\n";
                break;
            } 

            foreach ($array as $object)
            {
                foreach ($object as $key=>$value)
                {
                    echo ucfirst($key)." = $value\n";
                }   
                echo "\n";
            }
            break;
        case 9:

            echo "\n    Encerrando... \n";
            $exit = true;
            break;
    }
}
