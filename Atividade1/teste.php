<?php

session_start();

$_SESSION['teste'] = $_POST['opcao'];

header("location:jogo.php");

