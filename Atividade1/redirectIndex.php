<?php

session_start();

require_once 'classes/Model.php';

header("location: index.php");

Model::verifyGameCancelled();
