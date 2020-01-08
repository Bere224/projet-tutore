<?php
require_once("connect.php");


require_once("utilisateurFactory.php");
require_once("groupeFactory.php");

$email = $_POST["email"];
$idGroupe = $_POST["idGroupe"];

$utilisateur = utilisateurFactory::charger($email);
$groupe = groupeFactory::charger($idGroupe);


if($utilisateur == false)
{
	$mail = emailFactory::emailInvitationInscriptionGroupe($email,$groupe);
	$mail->envoyer();	
}
else
{
	$mail = emailFactory::emailInvitationGroupe($utilisateur,$groupe);
	$mail->envoyer();	
}

header("Refresh:3; url=accueil.php");


?>