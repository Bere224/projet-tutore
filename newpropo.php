<?php
require_once("connect.php");

require_once("proposition.php");
require_once("propositionFactory.php");

$nompropo = $co->real_escape_string($_POST["nompropo"]);
$desccourte = $co->real_escape_string($_POST['desccourte']);
$desclongue = $co->real_escape_string($_POST['desclongue']);
$catprinc = $co->real_escape_string($_POST['catprinc']);
$catsec = $co->real_escape_string($_POST['catsec']);
$datedecloture = $co->real_escape_string($_POST['datedecloture']);
$idGroupe = $co->real_escape_string($_POST['idGroupe']);



if($_POST['datechoix'] == 'sans')
{
	$datedecloture = '1999-01-01';
}

$propo = propositionFactory::creer($nompropo,$desccourte,$desclongue,$catprinc,$catsec,$datedecloture,$idConnecte,$idGroupe);

if($propo != false)
{
	$propo->ajouter_dans_db();
}


header('Location: /projet/projet-tutore/voirgroupeadmin.php?iddugroupe='.$idGroupe);

?>