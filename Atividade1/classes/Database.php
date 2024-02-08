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
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.question (
            type  varchar(2500),
            difficulty varchar(2500), 
            category varchar(2500),
            question varchar(2500),
            correct_answer varchar(2500),
            incorrect_answers varchar(2500),
            answers varchar(2500)
        );");
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.player (
            name varchar(2500),
            correct int4,
            incorrect int4
        );");
    }

    function select($tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM $tableName"); //consulta
        return $result;
    }

    function getAll(string $tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM ".strtolower($tableName)."");
        $result = pg_fetch_all($result);
        return $result;
    }
    
    function insert(object $object)
    {
        $objectName = get_class($object);
        $objectVariables = get_object_vars($object);
        pg_insert($this->connection, strtolower($objectName), $objectVariables);
    }



}
