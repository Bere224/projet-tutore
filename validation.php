<?php

require_once("utilisateur.php");
require_once("utilisateurFactory.php");


$id = $_GET["id"];
$utilisateur = utilisateurFactory::charger($id);

echo "validation id " . $utilisateur->getId();

$utilisateur->setValide(1);

$utilisateur->modifier_dans_db();

header("Refresh:0; url=/projet/projet-tutore/connexion.php");