<?php

require_once("connect.php");

class commentaire {
	private $id;
	private $texte;
	private $idUtilisateur;
	private $idProposition;
	private $dateCreation;
	private $nbSignalement;

	function __construct($id, $texte, $idUtilisateur, $idProposition, $dateCreation, $nbSignalement) {
		$this->id = $id;
		$this->texte = $texte;
		$this->idUtilisateur = $idUtilisateur;
		$this->idProposition = $idProposition;
		$this->dateCreation = $dateCreation;
		$this->nbSignalement = $nbSignalement;
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

	function getNbSignalement(){
		return $this->nbSignalement;
	}

	function setNbSignalement($nbSignalement){
		$this->nbSignalement = $nbSignalement;

		return $this;
	}

    function ajouter_dans_db(){
        global $co;
        $result = mysqli_query($co, "INSERT INTO commentaire(contenu,dateCreation,nbSignalement,ID,IDPropo) VALUES('$this->texte','$this->dateCreation','$this->nbSignalement', '$this->idUtilisateur', '$this->idProposition')") or die ("Exécution de la requête impossible".mysqli_error($co));
        $id = $co->insert_id;
    }

    function modifier_dans_db(){
        global $co;
        $result = mysqli_query($co, "UPDATE commentaire SET contenu='$this->texte',dateCreation='$this->dateCreation',nbSignalement='$this->nbSignalement',ID='$this->idUtilisateur',IDPropo='$this->idProposition' WHERE IDCommentaire='$this->id'") or die ("Exécution de la requête impossible".mysqli_error($co));
    }
	
	function supprimer_dans_db(){
        global $co;
        $result = mysqli_query($co, "DELETE FROM commentaire WHERE IDCommentaire='$this->id'") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

}

?>