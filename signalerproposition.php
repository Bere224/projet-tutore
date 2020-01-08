<?php

require_once("propositionFactory.php");


$id = $_GET["id"];
$propo = propositionFactory::charger($id);

$propo->setNbSignalement($propo->getNbSignalement()+1);

$propo->modifier_dans_db();

header("Refresh:0; url=accueil.php");