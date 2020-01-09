<?php
require_once("connect.php");


require_once("utilisateur.php");
require_once("utilisateurFactory.php");

$login = $co->real_escape_string($_POST["username"]);
$mdp = $co->real_escape_string($_POST["password"]);

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