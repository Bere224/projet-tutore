<?php

$host = "localhost"; // ou 127.0.0.1
$user = "root";
$bdd = "ui"; // le nom de votre base de données
$passwd = "1234";
$co = mysqli_connect($host , $user , $passwd, $bdd) or
die("erreur de connexion");

session_start();
if(isset($_SESSION['idUtilisateur']) and $_SESSION['idUtilisateur'] >= 0)
{
	$idConnecte = $_SESSION['idUtilisateur'];
}
else
{
	$idConnecte = -1;
}


?>