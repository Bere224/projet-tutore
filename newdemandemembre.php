<?php
require_once("connect.php");


require_once("utilisateurFactory.php");
require_once("groupeFactory.php");

$email = $_POST["email"];
$idGroupe = $_POST["idGroupe"];

$utilisateur = utilisateurFactory::get($email);
$groupe = groupeFactory::get($idGroupe);


if($utilisateur == false)
{
	$mail = emailFactory::emailInvitationInscriptionGroupe($email,$groupe);
	$mail->envoi();	
}
else
{
	$mail = emailFactory::emailInvitationGroupe($utilisateur,$groupe);
	$mail->envoi();	
}

header("Location:accueil.php");



?>