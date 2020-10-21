<?php
//Session
session_start();
//Suppression des variable
session_unset();
//Suppression de la session
session_destroy();
//Redirection
header('Location: /');
?>