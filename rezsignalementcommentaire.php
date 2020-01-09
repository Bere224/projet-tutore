<?php

require_once("commentaireFactory.php");
require_once("propositionFactory.php");


$id = $_GET["idcom"];
$com = commentaireFactory::charger($id);

$com->setNbSignalement(0);

$com->modifier_dans_db();
$prop = propositionFactory::charger($com->getIdProposition());


header("Refresh:0; url=/projet/projet-tutore/voirsignalements.php?idGroupe=".$prop->getIdGroupe());