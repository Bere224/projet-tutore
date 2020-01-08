<?php

require_once("connect.php");

class vote {
	private $pour;
	private $idUtilisateur;
	private $idProposition;

	function __construct($pour, $idUtilisateur, $idProposition) {
		$this->pour = $pour;
		$this->idUtilisateur = $idUtilisateur;
		$this->idProposition = $idProposition;
	}

	function getId(){
		return $this->idUtilisateur;
	}

	function estPour(){
		return $this->pour;
	}

	function getIdUtilisateur(){
		return $this->idUtilisateur;
	}

	function getIdProposition(){
		return $this->idProposition;
	}

    function ajouter_dans_db(){
        global $co;
        $result = mysqli_query($co, "INSERT INTO vote(IDPropo,ID,pour) VALUES('$this->idProposition','$this->idUtilisateur','$this->pour')") or die ("Exécution de la requête impossible".mysqli_error($co));
        $id = $mysqli->insert_id;
    }

    function modifier_dans_db(){
        global $co;
        $result = mysqli_query($co, "UPDATE vote SET pour='$this->pour' WHERE IDPropo='$this->idProposition' AND ID='$this->idUtilisateur')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

	function supprimer_dans_db(){
        global $co;
        $result = mysqli_query($co, "DELETE FROM vote WHERE WHERE IDPropo='$this->idProposition' AND ID='$this->idUtilisateur'") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

}

?>