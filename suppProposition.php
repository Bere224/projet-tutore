<?php
require_once("connect.php");

require_once("ListeUtilisateur.php");
require_once("propositionFactory.php");
require_once("proposition.php");


$id=$_GET['idpropo'];
$propo=propositionFactory::charger($id); 
$propo->supprimer_dans_db();
		
header("Location:voirgroupeadmin.php");
?>