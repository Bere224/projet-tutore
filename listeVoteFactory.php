<?php
require_once("vote.php");
require_once("listeVote.php");
require_once("connect.php");

class listeVoteFactory {

    public static function listeVotePourUtilisateur($id) {

		global $co;
		
		$votes = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM vote where ID='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$votes[] = new vote(0,$donnees['pour'],$donnees['ID'],$donnees['IDPropo']);
	    }

		return new listeVotes($votes);

    }

    public static function listeVotePourProposition($id) {
		global $co;
		
		$votes = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM vote where IDPropo='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$votes[] = new vote(0,$donnees['pour'],$donnees['ID'],$donnees['IDPropo']);
	    }

		return new listeVotes($votes);
    }

}

?>