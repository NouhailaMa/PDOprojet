<?php

include_once '../racine.php';
include_once RACINE . '/service/LoginService.php';

session_start();

extract($_POST);

$us = new LoginService();
if ($us->signup($username, $password)) {
    $_SESSION['User'] = $_POST['username'];
    header("location:../index.php");
} else {
    header("location:../signin.php?msg=Données Erronées!");
}
?>
