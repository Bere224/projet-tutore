<?php
require_once("connect.php");

require_once("proposition.php");
require_once("propositionFactory.php");

$nompropo = $_POST["nompropo"];
$desccourte = $_POST['desccourte'];
$desclongue = $_POST['desclongue'];
$catprinc = $_POST['catprinc'];
$catsec = $_POST['catsec'];
$datedecloture = $_POST['datedecloture'];
$idGroupe = $_POST['idGroupe'];



if($_POST['datechoix'] = 'sans')
{
	$datedecloture = '1999-01-01';
}

$propo = propositionFactory::creer($nompropo,$desccourte,$desclongue,$catprinc,$catsec,$datedecloture,$idConnecte,$idGroupe);


$propo->ajouter_dans_db();


header('Location: creerpropo.php');
?>