<?php
require_once("connect.php");

require_once("groupeFactory.php");

$idGroupe = $_GET["idGroupe"];

$groupe = groupeFactory::charger($idGroupe);

$groupe->supprimer_dans_db();


header("location: /projet/projet-tutore/accueil.php");


?>
