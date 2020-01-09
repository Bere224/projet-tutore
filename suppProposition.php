<?php
require_once("connect.php");

require_once("listeUtilisateur.php");
require_once("propositionFactory.php");
require_once("proposition.php");


$id=$_GET['idpropo'];
$propo=propositionFactory::charger($id); 
$propo->supprimer_dans_db();


if(isset($_GET['retoursignalements']))
{
header("Location:/projet/projet-tutore/voirsignalements.php?idGroupe=".$propo->getIdGroupe());
}
else
{
	header("Location:/projet/projet-tutore/voirgroupeadmin.php?iddugroupe=".$propo->getIdGroupe());
}
?>