<?php
require_once("connect.php");

require_once("commentaireFactory.php");
require_once("propositionFactory.php");
require_once("proposition.php");


$id=$_GET['idcommentaire'];
$com=commentaireFactory::charger($id); 
$com->supprimer_dans_db();
$propo=propositionFactory::charger($com->getIdProposition()); 
		

if(isset($_GET['retoursignalements']))
{
header("Location:/projet/projet-tutore/voirsignalements.php?idGroupe=".$propo->getIdGroupe());
}
else
{
	header("Location:/projet/projet-tutore/voirgroupeadmin.php?iddugroupe=".$propo->getIdGroupe());
}
?>