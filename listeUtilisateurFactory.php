<?php
require_once("proposition.php");
require_once("listeProposition.php");
require_once("connect.php");

class listeUtilisateurFactory {

    public static function listeUtilisateur() {
		global $co;
		
		$utilisateur = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM utilisateur") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$utilisateur[] = new utilisateur($donnees['ID'],$donnees['Login'],$donnees['nom'],$donnees['prenom'],$donnees['mail'],$donnees['mdp'],$donnees['dateInscription'],$donnees['valide'],$donnees['nbSignalement']);
	    }

		return new listeUtilisateur($utilisateur);
    }

    public static function listeUtilisateurPourGroupe($id) {
		global $co;
		
		$utilisateur = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM utilisateur NATURAL JOIN est_dans WHERE IDGroupe='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$utilisateur[] = new utilisateur($donnees['ID'],$donnees['Login'],$donnees['nom'],$donnees['prenom'],$donnees['mail'],$donnees['mdp'],$donnees['dateInscription'],$donnees['valide'],$donnees['nbSignalement']);
	    }

		return new listeUtilisateur($utilisateur);
    }

}

?>