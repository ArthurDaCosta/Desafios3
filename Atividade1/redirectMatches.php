<?php

session_start();

require_once 'classes/Verify.php';
require_once 'classes/Database.php';
require_once 'classes/Player.php';

header("location: matches.php");

$database = new Database();
$database->makeConnection();
$database->createTables();

Verify::verifyOpcao();
Verify::verifyGameFinished($database);
