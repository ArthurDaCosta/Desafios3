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
            project_id INT,
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
            usuario_id INT,
            tarefa_id INT,
            data_atribuicao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );");
    }

    function select($tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM $tableName");

        return $result;
    }

    function insert($object)
    {
        $objectName = get_class($object);
        $objectVars = get_object_vars($object);
        $objectVarsKeys = array_keys($objectVars);
        $objectVarsValues = array_values($objectVars);
        $objectVarsKeysString = implode(", ", $objectVarsKeys);
        $objectVarsValuesString = implode("', '", $objectVarsValues);
        $objectVarsValuesString = "'" . $objectVarsValuesString . "'";
        $query = "INSERT INTO $objectName ($objectVarsKeysString) VALUES ($objectVarsValuesString)";
        pg_query($this->connection, $query);
    }
}
