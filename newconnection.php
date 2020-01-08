<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("utilisateur.php");
require_once("utilisateurFactory.php");

$login = $_POST["username"];
$mdp = $_POST["password"];

$connect = utilisateurFactory::connexion($login,$mdp);
if($connect == false)
{
	header("Location:projet/projet-tutore/connexion.php");
}

else 
{
	header("Location:/projet/projet-tutore/accueil.php");
}


?>