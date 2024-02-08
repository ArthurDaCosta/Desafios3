<?php

session_start();

require_once 'classes/Model.php';
require_once 'classes/Database.php';
require_once 'classes/Player.php';

header("location: matches.php");

$database = new Database();
$database->makeConnection();

Model::verifyOpcao();
Model::verifyGameFinished($database);
