<?php

class database
{
    public $connection;

    function makeConnection()
    {
        $database = pg_connect("host=postgres port=5432 dbname=postgres user=exemplo password=exemplo")
            or die("Could not connect.\n");
        $this->connection = $database;
    }

    function createTables()
    {
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.questions (
            type  varchar(2500),
            difficulty varchar(2500), 
            category varchar(2500),
            question varchar(2500),
            correct_answer varchar(2500),
            incorrect_answers varchar(2500)
        );");
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.players (
            name varchar(2500),
            corretas int4,
            incorretas int4
        );");
    }

    function select($tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM $tableName"); //consulta
        return $result;
    }
    
    function post(string $tableName, array $value){
        pg_insert($this->connection, $tableName, $value);

    }



}
