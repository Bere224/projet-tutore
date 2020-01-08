<?php

require_once("commentaireFactory.php");


$id = $_GET["id"];
$com = commentaireFactory::charger($id);

$com->setNbSignalement($com->getNbSignalement()+1);

$com->modifier_dans_db();

header("Refresh:0; url=accueil.php");