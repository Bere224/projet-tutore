<?php
require_once("connect.php");

require_once("utilisateurFactory.php");
require_once("groupeFactory.php");

$idUtilisateur = $_GET["idUtilisateur"];
$idGroupe = $_GET["idGroupe"];

$utilisateur = utilisateurFactory::charger($idUtilisateur);
$groupe = groupeFactory::charger($idGroupe);

$groupe->supprimer_utilisateur($utilisateur);

header("Location:accueil.php");

?>
