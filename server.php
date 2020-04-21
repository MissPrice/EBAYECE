<?php

session_start();

$UserId = "";
$Login = "";
$Username = "";
$_SESSION['success'] = "";
$errors = array();

//identifier votre BDD
$database = "bdd";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root|votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



?>