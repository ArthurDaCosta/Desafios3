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
        $exist = pg_fetch_row(pg_query($this->connection, 
            "SELECT EXISTS ( SELECT * 
            FROM INFORMATION_SCHEMA.TABLES 
            WHERE TABLE_SCHEMA = 'public' 
            AND  TABLE_NAME = 'questions')"));
    
        if($exist[0] == 'f') 
        {
            pg_query($this->connection, "CREATE TABLE public.questions (
                'type' NOT NULL,
                difficulty NULL,
                cattegory NULL,
                question int4 NULL,
                correct_answer NULL,
                incorrect_answers NULL,
            );");
        }

         $exist = pg_fetch_row(pg_query($this->connection, 
            "SELECT EXISTS ( SELECT * 
            FROM INFORMATION_SCHEMA.TABLES 
            WHERE TABLE_SCHEMA = 'public' 
            AND  TABLE_NAME = 'players')"));
    
        if($exist[0] == 'f') 
        {
            pg_query($this->connection, "CREATE TABLE public.players (
                'name' NULL
            );");
        }
        
    }

    function select($tableName)
    {
        $result = pg_query($this->connection, "SELECT * FROM $tableName");

        return $result;
    }
}
