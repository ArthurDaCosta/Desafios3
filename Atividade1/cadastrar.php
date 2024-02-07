<?php

function a(){
        $opcao = $_POST('question');

        $conn = pg_connect("host=postgres port=5432 dbname=postgres user=exemplo password=exemplo")
        or die("Could not connect.\n");
$data = new Database;

        $result_opcao = pg_query($data->connection,"INSERT INTO questions (question) VALUES ('$opcao')");

        $resultado = pg_query($data->connection, $result_opcao);
        var_dump($opcao);
       // return ($resultado);

}
 