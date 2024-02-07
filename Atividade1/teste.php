<?php

session_start();

$_SESSION['teste'] = $_POST['opcao'];


var_dump($_SESSION['teste']);

