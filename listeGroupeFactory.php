<?php

require_once("groupe.php");
require_once("listeGroupe.php");
require_once("connect.php");

class listeGroupeFactory {

    public static function listeGroupes() {
		global $co;
		
		$groupes = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM groupe") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$groupes[] = new groupe($donnees['IDGroupe'],$donnees['libelle'],$donnees['dateCreation'],$donnees['nbSignalement'],$donnees['ID']);
	    }

		return new listeGroupe($groupes);
    }


    public static function listeGroupesPossedeParUtilisateur($id) {
		global $co;
		
		$groupes = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM groupe WHERE ID='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$groupes[] = new groupe($donnees['IDGroupe'],$donnees['libelle'],$donnees['dateCreation'],$donnees['nbSignalement'],$donnees['ID']);
	    }

		return new listeGroupe($groupes);
    }

    public static function listeGroupesPourUtilisateur($id) {
		global $co;
		
		$groupes = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM groupe, est_dans WHERE est_dans.IDGroupe = groupe.IDGroupe AND est_dans.ID='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$groupes[] = new groupe($donnees['IDGroupe'],$donnees['libelle'],$donnees['dateCreation'],$donnees['nbSignalement'],$donnees['ID']);
	    }

		return new listeGroupe($groupes);
    }


    public static function listeGroupesSignalement() {
		global $co;
		
		$groupes = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM groupe WHERE nbSignalement>0") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$groupes[] = new groupe($donnees['IDGroupe'],$donnees['libelle'],$donnees['dateCreation'],$donnees['nbSignalement'],$donnees['ID']);
	    }

		return new listeGroupe($groupes);
	}

}

?>