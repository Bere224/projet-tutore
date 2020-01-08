<?php
requiere_once("connect.php");

$_SESSION['idUtilisateur'] = -1;


echo "<h1>Vous etes déconnectés</h1>";

header("Refresh:3; url=connexion.php");

?>