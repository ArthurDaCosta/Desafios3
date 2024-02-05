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
    echo "\n1 - Cadastrar Projeto\n";
    echo "2 - Cadastrar Tarefa\n";
    echo "3 - Cadastrar Usuário\n";
    echo "4 - Atribuir Tarefa\n";
    echo "5 - Listar Projetos\n";
    echo "6 - Listar Tarefas\n";
    echo "7 - Listar Usuários\n";
    echo "8 - Listar Atribuições\n";
    echo "9 - Sair\n";
    $escolha = (int) readline("Escolha: ");

    switch($escolha)
    {
        case 1:
            $projeto = new Projetos();
            $projeto->nome = readline("Nome do projeto: ");
            $projeto->descricao = readline("Descrição do projeto: ");
            $projeto->data_inicio = readline("Data de início do projeto(Ano/Mês/Dia): ");
            $projeto->data_fim = readline("Data de fim do projeto(Ano/Mês/Dia): ");
            $database->insert($projeto);
            break;
        case 2:
            $tarefa = new Tarefas();
            $tarefa->descricao = readline("Descrição da tarefa: ");
            $tarefa->project_id = readline("ID do projeto: ");
            $tarefa->data_inicio = readline("Data de início da tarefa(Ano/Mês/Dia): ");
            $tarefa->data_fim = readline("Data de fim da tarefa(Ano/Mês/Dia): ");
            $database->insert($tarefa);
            break;
        case 3:
            $usuario = new Usuarios();
            $usuario->nome = readline("Nome do usuário: ");
            $usuario->email = readline("E-mail do usuário: ");
            $database->insert($usuario);
            break;
        case 4:
            $atribuicao = new Atribuicoes();
            $atribuicao->usuario_id = readline("ID do usuário: ");
            $atribuicao->tarefa_id = readline("ID da tarefa: ");
            $database->insert($atribuicao);
            break;
        case 5:
            $result = $database->select("Projetos");
            while ($row = pg_fetch_row($result))
            {
                echo "ID: $row[0] Nome: $row[1] Descrição: $row[2] Data de início: $row[3] Data de fim: $row[4]\n";
            }
            break;
        case 6:
            $result = $database->select("Tarefas");
            while ($row = pg_fetch_row($result))
            {
                echo "ID: $row[0] Descrição: $row[1] ID do projeto: $row[2] Data de início: $row[3] Data de fim: $row[4]\n";
            }
            break;
        case 7:
            $result = $database->select("Usuarios");
            while ($row = pg_fetch_row($result))
            {
                echo "ID: $row[0] Nome: $row[1] E-mail: $row[2]\n";
            }
            break;
        case 8:
            $result = $database->select("Atribuicoes");
            while ($row = pg_fetch_row($result))
            {
                echo "ID: $row[0] ID do usuário: $row[1] ID da tarefa: $row[2] Data de atribuição: $row[3]\n";
            }
            break;
        case 9:
            $exit = true;
            break;
    }
}
