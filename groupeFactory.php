<?php

require_once("connect.php");
require_once("groupe.php");
class groupeFactory {

    public static function creerGroupe($nom,$idUtilisateur)
    {
        return new groupe(0,$nom,date('Y-m-d'),0,$idUtilisateur);
    }

    public static function charger($id)
    {
		global $co;
		
		$result = false;
		
		$reponse = mysqli_query($co, "SELECT * FROM groupe WHERE IDGroupe='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$result = new groupe($donnees['IDGroupe'],$donnees['libelle'],$donnees['dateCreation'],$donnees['nbSignalement'],$donnees['ID']);
	    }

		return $result;
    }

}

?>