<?php
require_once("connect.php");

require_once("utilisateurFactory.php");
require_once("groupeFactory.php");

$idUtilisateur = $_POST["idUtilisateur"];
$idGroupe = $_POST["idGroupe"];

$utilisateur = utilisateurFactory::get($idUtilisateur);
$groupe = groupeFactory::get($idGroupe);

$groupe->retirer_utilisateur($utilisateur);

header("Location:accueil.php");

?>
