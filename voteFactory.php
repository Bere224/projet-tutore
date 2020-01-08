<?php

require_once("connect.php");

class voteFactory {

	public static function creer($pour, $idUtilisateur, $idProposition){
		return new vote(0,$pour,$idUtilisateur,$idProposition);
	}

	public static function charger($id){
		global $co;
		
		$result = false;
		
		$reponse = mysqli_query($co, "SELECT * FROM vote WHERE IDVote=$id") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$result = new vote($donnees['IDVote'],$donnees['pour'],$donnees['ID'],$donnees['IDPropo']);
	    }

		return $result;
	}

}

?>