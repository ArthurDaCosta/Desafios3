<?php

session_start();

require_once 'classes/Verify.php';

header("location: index.php");

Verify::verifyGameCancelled();
