<?php

require_once("connect.php");


class groupe {
	private $id;
	private $nom;
	private $dateCreation;
	private $nbSignalement;
    private $idUtilisateur;

	function __construct($id, $nom, $dateCreation, $nbSignalement, $idUtilisateur) {
		$this->id = $id;
		$this->nom = $nom;
		$this->dateCreation = $dateCreation;
		$this->nbSignalement = $nbSignalement;
        $this->idUtilisateur = $idUtilisateur;
	}



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getNbSignalement()
    {
        return $this->nbSignalement;
    }

    public function setNbSignalement($nbSignalement)
    {
        $this->nbSignalement = $nbSignalement;

        return $this;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


	function ajouter_dans_db(){
		$result = mysqli_query($co, "INSERT INTO groupe(libelle,dateCreation,ID,nbSignalement) VALUES('$this->nom','$this->dateCreation','$this->idUtilisateur', '$this->nbSignalement')") or die ("Exécution de la requête impossible".mysqli_error($co));
		$id = $mysqli->insert_id;
	}

    function modifier_dans_db(){
        $result = mysqli_query($co, "UPDATE groupe SET libelle='$this->nom',dateCreation='$this->dateCreation',ID='$this->idUtilisateur',nbSignalement='$this->nbSignalement' WHERE IDGroupe='$this->id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

    function supprimer_dans_db(){
        $result = mysqli_query($co, "DELETE FROM groupe WHERE IDGroupe='$this->id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

}

?>