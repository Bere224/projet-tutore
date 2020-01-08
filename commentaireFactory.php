*<?php

require_once("commentaire.php");
require_once("connect.php");

class commentaireFactory {


	public function creer($texteCommmentaire, $idUtilisateur, $idProposition){
		return new commentaire(0 ,$texteCommmentaire, $idUtilisateur, $idProposition, date('Y-m-d'));
	}

	public function charger($id){
		global $co;
		
		$result = false;
		
		$reponse = mysqli_query($co, "SELECT * FROM commentaire WHERE IDCommentaire='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$result = new commentaire($donnees['IDCommentaire'],$donnees['contenu'],$donnees['ID'],$donnees['IDPropo'],$donnees['dateCreation']);
	    }

		return $result;
	}

}

?>