<?php

session_start();
unset($_SESSION['conectado']);
session_destroy();
header("location: ../home.php");