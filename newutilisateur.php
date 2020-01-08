<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once("connect.php");


require_once("utilisateur.php");
require_once("utilisateurFactory.php");
require_once("email.php");
require_once("emailFactory.php");


$login = $_POST["login"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mail = $_POST["email"];
$mdp = $_POST["password"];
$dateArrivee = date("Y-m-d");

echo 'test';
/*$result = mysqli_query($co, 'INSERT INTO utilisateur(ID,Login,mail,mdp,nom,prenom,valide,dateInscription) VALUES(\'$login\',\'$nom\',\'$prenom\',\'$mail\',0,\'mdp\',\'$dateArrivee\')') or die ("Exécution de la requête impossible".mysqli_error($co));
echo 'test2';*/



$utilisateuuur = utilisateurFactory::inscription($login,$nom,$prenom,$mail,$mdp,$dateArrivee);
if($utilisateuuur == false)
{
	
}
$utilisateuuur->ajouter_dans_db();

$email = emailFactory::emailInscription($utilisateuuur);
$email->envoyer();





?>
