<?php
include('connexion.php');
//Ajout et suppression de bouton
session_start();
if (isset($_POST['addButton'])) {
    $title = htmlspecialchars($_POST['title']);
    $link = htmlspecialchars($_POST['link']);
    $tag = $_POST['tag'];
    $requeste = "INSERT INTO button (id, title, id_tag, link)
                            VALUES (NULL,'$title',$tag,'$link')";
    if (!empty($_SESSION['login'])) {
        $res = $connexion->exec($requeste);
    }
    header('Location: ../index.php');
}
if (isset($_POST['removeButton'])) {
    $btn = $_POST['btn'];
    $requeste = "DELETE FROM button WHERE id='".$btn."'";
    if (!empty($_SESSION['login'])) {
        $res = $connexion->exec($requeste);
    }
    header('Location: ../index.php');
}
?>