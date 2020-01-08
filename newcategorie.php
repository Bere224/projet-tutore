<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("categorie.php");
require_once("categorieFactory.php");

$nom = $_POST["nom"];
$description = $_POST["description"]



/*$result = mysqli_query($co, 'INSERT INTO groupe(libelle,dateCreation,ID) VALUES(\'$nomgrp\',\'$datecreation\', 1)') or die ("Exécution de la requête impossible".mysqli_error($co));
echo 'test2';
header('Location: creergroupe.php');*/


$cat = categorieFactory::creercategorie($nom,$description);

$cat->ajouter_dans_db();

?>