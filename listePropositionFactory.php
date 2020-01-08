<?php
require_once("proposition.php");
require_once("listeProposition.php");
require_once("connect.php");

class listePropositionFactory {

    public static function listePropositionPourUtilisateur($id) {
		global $co;
		
		$propositions = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM proposition") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$propositions[] = new proposition($donnees['IDPropo'],$donnees['nompropo'],$donnees['descCourte'],$donnees['descLongue'],$donnees['catprinc'],$donnees['catsec'],$donnees['nbSignalement'],$donnees['dateLimite'],$donnees['dateDepassee'],$donnees['dateCreation'],$donnees['ID'],$donnees['IDGroupe']);
	    }

		return new listeProposition($propositions);
    }

    public static function listePropositionPourGroupe($id) {
		global $co;
		
		$propositions = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM proposition where IDGroupe='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$propositions[] = new proposition($donnees['IDPropo'],$donnees['nompropo'],$donnees['descCourte'],$donnees['descLongue'],$donnees['catprinc'],$donnees['catsec'],$donnees['nbSignalement'],$donnees['dateLimite'],$donnees['dateDepassee'],$donnees['dateCreation'],$donnees['ID'],$donnees['IDGroupe']);
	    }

		return new listeProposition($propositions);
    }

    public static function listePropositionSignalement() {
		global $co;
		
		$propositions = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM proposition where nbSignalement>0") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$propositions[] = new proposition($donnees['IDPropo'],$donnees['nompropo'],$donnees['descCourte'],$donnees['descLongue'],$donnees['catprinc'],$donnees['catsec'],$donnees['nbSignalement'],$donnees['dateLimite'],$donnees['dateDepassee'],$donnees['dateCreation'],$donnees['ID'],$donnees['IDGroupe']);
	    }

		return new listeProposition($propositions);
    }


}

?>