<?php

class database
{
    public $connection;

    function makeConnection()
    {
        $database = pg_connect("host=localhost port=3600 dbname=postgres user=exemplo password=exemplo")
            or die("Could not connect.\n");
        $this->connection = $database;
    }

    function createTables()
    {
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.Projetos (
            id serial NOT NULL,
            nome varchar(255) NOT NULL,
            descricao TEXT,
            data_inicio DATE,
            data_fim DATE
        );");
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.Tarefas (
            id serial NOT NULL,
            descricao TEXT NOT NULL,
            project_id INT REFERENCES Projetos(id),
            data_inicio DATE,
            data_fim DATE
        );");

        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.Usuarios (
            id serial NOT NULL,
            nome varchar(100) NOT NULL,
            email varchar(100) NOT NULL
        );");

        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.Atribuicoes (
            id serial NOT NULL,
            usuario_id INT REFERENCES Usuarios(id),
            tarefa_id INT REFERENCES Tarefas(id),
            data_atribuicao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );");
    }

    function getAll(string $tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM ".strtolower($tableName)."");
        $result = pg_fetch_all($result);
        return $result;
    }

    function getOne(string $tableName, string $id)
    {
        $result = pg_query($this->connection, "SELECT * FROM ".strtolower($tableName)." WHERE id = $id");
        $result = pg_fetch_array($result);
        return $result;
    }

    function select(string $tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM $tableName");

        return $result;
    }

    function insert(object $object)
    {
        $objectName = get_class($object);
        $objectVariables = get_object_vars($object);
        pg_insert($this->connection, strtolower($objectName), $objectVariables);
    }
}
