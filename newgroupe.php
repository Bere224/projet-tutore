<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("groupe.php");
require_once("groupeFactory.php");

$nomgrp = $_POST["nomgrp"];
$datecreation = date("d-m-Y");


echo 'test';
$result = mysqli_query($co, 'INSERT INTO groupe(libelle,dateCreation,ID) VALUES(\'$nomgrp\',\'$datecreation\', 1)') or die ("Exécution de la requête impossible".mysqli_error($co));
echo 'test2';
header('Location: creergroupe.php');


$group = groupeFactory::creergroupe($nomgrp,$datecreation);

$group->ajouter_dans_db();

?>
