<?php

class database
{
    public $connection;

    function makeConnection()
    {
        $database = pg_connect("host=postgres port=5432 dbname=postgres user=exemplo password=exemplo")
            or die("Could not connect.\n");
        return $database;
    }

    function createTables()
    {
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.questions (
            'type' NOT NULL,
            difficulty NULL,
            cattegory NULL,
            question int4 NULL,
            correct_answer NULL,
            incorrect_answers NULL,
        );");
        
        pg_query($this->connection, "CREATE TABLE IF NOT EXISTS public.players (
            'name' NULL
        );");
    }

    function select($tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM $tableName");

        return $result;
    }
}
