<?php
require_once("connect.php");

require_once("utilisateurFactory.php");
require_once("groupeFactory.php");

$idUtilisateur = $_GET["idUtilisateur"];
$idGroupe = $_GET["idGroupe"];

$utilisateur = utilisateurFactory::get($idUtilisateur);
$groupe = groupeFactory::get($idGroupe);

$groupe->ajouter_utilisateur($utilisateur);


header("Location:accueil.php");
?>