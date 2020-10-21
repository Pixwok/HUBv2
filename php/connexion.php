<?php
//Variable serveur
define("SERVEUR","localhost");
define("USER","");
define("MDP","");
define("BD","");

try {
$connexion= new PDO('mysql:host='.SERVEUR.';dbname='.BD, USER, MDP);      //Connexion DB
$connexion->exec("SET CHARACTER SET utf8");	//Gestion des accents          
}
catch(Exception $e) { //Control d'erreur
    echo 'Erreur : '.$e->getMessage().'<br />'; 
    echo 'N° : '.$e->getCode();
}
?>