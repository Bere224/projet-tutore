<?php
require_once("connect.php");


require_once("utilisateur.php");
require_once("utilisateurFactory.php");

$login = $_POST["username"];
$mdp = $_POST["password"];

$connect = utilisateurFactory::connexion($login,$mdp);
if($connect == false)
{
	echo "Mauvais !";
	die("Impossible de vous connecter");
	header("Refresh:3; url=connexion.php");
}

else 
{
	header("Location:accueil.php");
}


?>