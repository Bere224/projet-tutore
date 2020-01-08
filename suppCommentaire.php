<?php
require_once("connect.php");

require_once("commentaireFactory.php");
require_once("proposition.php");


$id=$_GET['idcommentaire'];
$com=commentaireFactory::charger($id); 
$com->supprimer_dans_db();
		
header("Location:accueil.php");
?>