*<?php

require_once("commentaire.php");
require_once("connect.php");

class commentaireFactory {


	public static function creer($texteCommmentaire, $idUtilisateur, $idProposition){
		global $co;

        $reponse = mysqli_query($co, "SELECT * FROM commentaire WHERE contenu='$texteCommmentaire' AND ID='$idUtilisateur' AND IDPropo='$idProposition'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            return false;
        }		

		return new commentaire(0 ,$texteCommmentaire, $idUtilisateur, $idProposition, date('Y-m-d'), 0);
	}

	public static function charger($id){
		global $co;
		
		$result = false;
		
		$reponse = mysqli_query($co, "SELECT * FROM commentaire WHERE IDCommentaire='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$result = new commentaire($donnees['IDCommentaire'],$donnees['contenu'],$donnees['ID'],$donnees['IDPropo'],$donnees['dateCreation'],$donnees['nbSignalement']);
	    }

		return $result;
	}

}

?>