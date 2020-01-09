*<?php

require_once("categorie.php");
require_once("connect.php");

class categorieFactory {

	static function creer($nom, $idGroupe){
		global $co;

        $reponse = mysqli_query($co, "SELECT * FROM categorie WHERE nom='$nom' AND IDGroupe='$idGroupe'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            return false;
        }       

		return new categorie(0, $nom, $idGroupe);
	}

	static function charger($id){
		global $co;
		
		$result = false;
		
		$reponse = mysqli_query($co, "SELECT * FROM categorie WHERE IDCategorie='$id'")  or die ("Exécution de la requête impossible".mysqli_error($co));;
		while($donnees = mysqli_fetch_array($reponse))
		{
			$result = new categorie($donnees['IDCategorie'],$donnees['nom'],$donnees['IDGroupe']);
	    }

		return $result;
	}

}

?>