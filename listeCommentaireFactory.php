<?php
require_once("commentaire.php");
require_once("listeCommentaire.php");
require_once("connect.php");

class listeCommentaireFactory {

    public static function listeCommentaires() {
		global $co;
		
		$commentaires = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM commentaire") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$commentaires[] = new commentaire($donnees['IDCommentaire'],$donnees['contenu'],$donnees['ID'],$donnees['IDPropo'],$donnees['dateCreation'],$donnees['nbSignalement']);
	    }

		return new listeCommentaire($commentaires);
    }

    public static function listeCommentairePourUtilisateur($id) {
		global $co;
		
		$commentaires = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM commentaire where ID='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$commentaires[] = new commentaire($donnees['IDCommentaire'],$donnees['contenu'],$donnees['ID'],$donnees['IDPropo'],$donnees['dateCreation'],$donnees['nbSignalement']);
	    }

		return new listeCommentaire($commentaires);
    }

    public static function listeCommentairePourProposition($id) {
		global $co;
		
		$commentaires = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM commentaire where IDPropo='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$commentaires[] = new commentaire($donnees['IDCommentaire'],$donnees['contenu'],$donnees['ID'],$donnees['IDPropo'],$donnees['dateCreation'],$donnees['nbSignalement']);
	    }

		return new listeCommentaire($commentaires);
    }

    public static function listeCommentaireSignalement() {
		global $co;
		
		$commentaires = array();
		
		$reponse = mysqli_query($co, "SELECT * FROM commentaire where nbSignalement>0") or die ("Exécution de la requête impossible".mysqli_error($co));
		while($donnees = mysqli_fetch_array($reponse))
		{
			$commentaires[] = new commentaire($donnees['IDCommentaire'],$donnees['contenu'],$donnees['ID'],$donnees['IDPropo'],$donnees['dateCreation'],$donnees['nbSignalement']);
	    }

		return new listeCommentaire($commentaires);
    }
}

?>