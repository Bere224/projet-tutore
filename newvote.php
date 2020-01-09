<?php
require_once("connect.php");


require_once("voteFactory.php");

$idProposition = $_GET["idProposition"];
$pour = $_GET["pour"];

$vote = voteFactory::creer($pour,$idConnecte,$idProposition);

if($vote == false)
{
	echo "triche !";
    header("Refresh: 3; url=accueil.php");
    die();
}

$vote->ajouter_dans_db();

header('Location: /projet/projet-tutore/voirpropo.php?idPropo='.$idProposition);

?>