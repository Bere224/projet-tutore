<?php
require_once("connect.php");


require_once("utilisateur.php");
require_once("utilisateurFactory.php");
require_once("email.php");
require_once("emailFactory.php");
require_once("groupe.php");
require_once("groupeFactory.php");


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
	die("Impossible de vous inscrire");
}
$utilisateuuur->ajouter_dans_db();


if(isset($_POST['autoGroupe']) && !empty($_POST['autoGroupe']))
{
	$groupeId = $_POST['autoGroupe'];
	$legroupe = groupeFactory::charger($groupeId);
	$legroupe->ajouter_utilisateur($utilisateuuur);
}

$email = emailFactory::emailInscription($utilisateuuur);
$email->envoyer();





?>
