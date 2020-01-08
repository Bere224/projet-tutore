<?php
require_once("connect.php");

require_once("proposition.php");
require_once("propositionFactory.php");

$nompropo = $_POST["nompropo"];
$desccourte = $_POST['desccourte'];
$desclongue = $_POST['desclongue'];
$catprinc = $_POST['catprinc'];
$catsec = $_POST['catsec'];
$datedecloture = $_POST['datedecloture'];
$datecreation = date("Y-m-d");

/*$result = mysqli_query($co,'INSERT INTO proposition(nompropo,descCourte,descLongue,catprinc,catsec,dateLimite,dateCreation,Login)VALUES(\'$nompropo\',\'$desccourte\',\'$desclongue\',\'$catprinc\',\'$catsec\',\'$datedecloture\',\'$datecreation\',\'toto\')') or die ("Exécution de la requête impossible ".mysqli_error($co));
header('Location: creerpropo.php');*/


$propo = propositionFactory::creerpropo($nompropo,$desccourte,$desclongue,$catprinc,$catsec,$datecloture,$datecreation);


$propo->ajouter_dans_db();

?>