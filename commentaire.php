<?php

require_once("connect.php");

class commentaire {
	private $id;
	private $texte;
	private $idUtilisateur;
	private $idProposition;
	private $dateCreation;

	function __construct($id, $texte, $idUtilisateur, $idProposition, $dateCreation) {
		$this->id = $id;
		$this->texte = $texte;
		$this->idUtilisateur = $idUtilisateur;
		$this->idProposition = $idProposition;
		$this->dateCreation = $dateCreation;
	}

	function getId(){
		return $this->id;
	}

	function getTexte(){
		return $this->texte;
	}

	function getIdUtilisateur(){
		return $this->idUtilisateur;
	}

	function getIdProposition(){
		return $this->idProposition;
	}

	function getDateCreation(){
		return $this->dateCreation;
	}

    function ajouter_dans_db(){
        $result = mysqli_query($co, "INSERT INTO commentaire(contenu,dateCreation,nbSignalement,ID,IDPropo) VALUES('$texte','$this->dateCreation','$this->nbSignalement', '$this->idUtilisateur', '$this->idProposition')") or die ("Exécution de la requête impossible".mysqli_error($co));
        $id = $mysqli->insert_id;
    }

    function modifier_dans_db(){
        $result = mysqli_query($co, "UPDATE commentaire SET contenu='$this->texte',dateCreation='$this->dateCreation',nbSignalement='$this->nbSignalement',ID='$this->idUtilisateur',IDPropo='$this->idProposition' WHERE IDCommentaire='$id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }
	
	function supprimer_dans_db(){
        $result = mysqli_query($co, "DELETE FROM commentaire WHERE IDCommentaire='$this->id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

}

?>