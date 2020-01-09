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
	echo "Envoyé !";
}
else
{
	if(!$groupe->possede_utilisateur($utilisateur))
	{
		$mail = emailFactory::emailInvitationGroupe($utilisateur,$groupe);
		$mail->envoyer();	
		echo "Envoyé !";
	}
	else
	{
		echo "Déjà dans le groupe !";
	}
}

header("Refresh:3; url=accueil.php");


?>