<?php

require_once("propositionFactory.php");


$id = $_GET["idpropo"];
$propo = propositionFactory::charger($id);

$propo->setNbSignalement(0);

$propo->modifier_dans_db();

header("Refresh:0; url=/projet/projet-tutore/voirsignalements.php?idGroupe=".$propo->getIdGroupe());