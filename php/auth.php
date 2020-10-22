<?php
include('connexion.php');
session_start();
session_unset();
if (isset($_POST['login'])) {
    $login = htmlspecialchars($_POST['pseudo']);
    $passwd = hash('sha256', $_POST['passwd']);
    $request = "SELECT * FROM account WHERE pseudo='".$login."' AND passwd='".$passwd."'";
    $res = $connexion->query($request);
    $data = $res->fetchALL(PDO::FETCH_ASSOC);
    if (count($data) === 1) {
        $_SESSION['login'] = htmlspecialchars($_POST['pseudo']);
    } else {
        $_SESSION['error'] = TRUE;
    }
    header('Location: ../index.php');
}
?>