<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("categorie.php");
require_once("categorieFactory.php");

$nom = $_POST["nom"];
$idGroupe = $_POST["idGroupe"];

$cat = categorieFactory::creer($nom,$idGroupe);

if($cat != false)
{
	$cat->ajouter_dans_db();
}


header('Location: /projet/projet-tutore/voirgroupeadmin.php?iddugroupe='.$idGroupe);

?>