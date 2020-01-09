<?php
require_once("connect.php");


require_once("groupe.php");
require_once("groupeFactory.php");

$nomgrp = $co->real_escape_string($_POST["nomgrp"]);

/*
echo 'test';
$result = mysqli_query($co, 'INSERT INTO groupe(libelle,dateCreation,ID) VALUES(\'$nomgrp\',\'$datecreation\', 1)') or die ("Exécution de la requête impossible".mysqli_error($co));
echo 'test2';
*/
$group = groupeFactory::creergroupe($nomgrp,$idConnecte);

if($group != false)
{
	$group->ajouter_dans_db();
}


header('Location: accueil.php');






?>
