<?php

session_start();

require_once 'classes/Router.php';
require_once 'classes/Controller.php';
require_once 'classes/Model.php';
require_once 'classes/Database.php';
require_once 'classes/Question.php';
require_once 'classes/Player.php';
require_once 'classes/API.php';
require_once 'classes/RequestAPI.php';

Model::verifyName();
Model::verifyOpcao();

$database = new Database();
$database->makeConnection();

$router = new Router();
$router->setMethod($_SERVER['REQUEST_METHOD']);
$router->setRoute($_SERVER['REQUEST_URI']); 

$router->verifyMethod($database);

if (!isset($_SESSION['questionNumber'])){
    $_SESSION['questionNumber'] = 1;
} 

header("location: jogo.php");



