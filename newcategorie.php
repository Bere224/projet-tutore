<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("categorie.php");
require_once("categorieFactory.php");

$nom = $_POST["nom"];
$description = $_POST["description"]

$cat = categorieFactory::creercategorie($nom,$description);

$cat->ajouter_dans_db();

header('Location : creercategorie.php');

?>