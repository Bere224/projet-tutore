<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("commentaire.php");
require_once("commentaireFactory.php");

$texteCommmentaire = $_POST["texte"];
$idUtilisateur = $idConnecte;
$idProposition = $_GET["idPropo"];


/*$result = mysqli_query($co, 'INSERT INTO commentaire(dateCreation) VALUES(\'$nomgrp\',\'12/11/20\', 1)') or die ("Exécution de la requête impossible".mysqli_error($co));
echo 'test2';*/


$commentaire = commentaireFactory::creer($texteCommmentaire,$idUtilisateur,$idProposition);

if($commentaire != false)
{
	$commentaire->ajouter_dans_db();
}

header('Location: http://localhost/projet/projet-tutore/voirpropo.php?idPropo='.$idProposition);


?>
