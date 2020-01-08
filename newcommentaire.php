<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("commentaire.php");
require_once("commentaireFactory.php");

$texteCommmentaire = $_POST["texteCommentaire"];
$idUtilisateur = $_POST["idUtilisateur"];
$idProposition = $_POST["idProposition"];


echo 'test';
/*$result = mysqli_query($co, 'INSERT INTO commentaire(dateCreation) VALUES(\'$nomgrp\',\'12/11/20\', 1)') or die ("Exécution de la requête impossible".mysqli_error($co));
echo 'test2';*/


$commentaire = commentaireFactory::charger($id);

$commentaire->setNbSignalement($commentaire->getNbSignalement()+1);

$commentaire->modifier_dans_db();



?>
