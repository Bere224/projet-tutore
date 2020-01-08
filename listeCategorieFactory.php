<?php
require_once("connect.php");
require_once("categorie.php");
require_once("listeCategorie.php");

class listeCategorieFactory {

    public static function listeCategories() {
		global $co;
		
		$categories = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM categorie") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$categories[] = new categorie($donnees['IDCategorie'],$donnees['nom'],$donnees['IDGroupe']) or die ("Exécution de la requête impossible".mysqli_error($co));
	    }

		return new listeCategorie($categories);
    }

    public static function listeCategoriesPourGroupe($id) {
		global $co;
		
		$categories = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM categorie where IDGroupe='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$categories[] = new categorie($donnees['IDCategorie'],$donnees['nom'],$donnees['IDGroupe']) or die ("Exécution de la requête impossible".mysqli_error($co));
	    }

		return new listeCategorie($categories);
    }

}

?>