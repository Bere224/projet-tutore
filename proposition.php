<?php

require_once("connect.php");

class proposition {
	private $id;
	private $nom;
	private $descriptionCourte;
	private $descriptionLongue;
	private $idCategoriePrimaire;
	private $idCategorieSecondaire;
	private $nbSignalement;
    private $dateLimite;
    private $dateDepassee;
    private $dateCreation;
    private $idUtilisateur;
    private $idGroupe;

	function __construct($id, $nom, $descriptionCourte, $descriptionLongue, $idCategoriePrimaire, $idCategorieSecondaire, $nbSignalement, $dateLimite, $dateDepassee, $dateCreation, $idUtilisateur) {
		$this->id = $id;
		$this->nom = $nom;
		$this->descriptionCourte = $descriptionCourte;
		$this->descriptionLongue = $descriptionLongue;
		$this->idCategoriePrimaire = $idCategoriePrimaire;
		$this->idCategorieSecondaire = $idCategorieSecondaire;
		$this->nbSignalement = $nbSignalement;
        $this->dateLimite = $dateLimite;
        $this->dateDepassee = $dateDepassee;
        $this->dateCreation = $dateCreation;
        $this->idUtilisateur = $idUtilisateur;
        $this->idGroupe = $idGroupe;
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

    public function getDescriptionCourte()
    {
        return $this->descriptionCourte;
    }

    public function setDescriptionCourte($descriptionCourte)
    {
        $this->descriptionCourte = $descriptionCourte;

        return $this;
    }

    public function getDescriptionLongue()
    {
        return $this->descriptionLongue;
    }

    public function setDescriptionLongue($descriptionLongue)
    {
        $this->descriptionLongue = $descriptionLongue;

        return $this;
    }

    public function getIdCategoriePrimaire()
    {
        return $this->idCategoriePrimaire;
    }

    public function setIdCategoriePrimaire($idCategoriePrimaire)
    {
        $this->idCategoriePrimaire = $idCategoriePrimaire;

        return $this;
    }

    public function getIdCategorieSecondaire()
    {
        return $this->idCategorieSecondaire;
    }

    public function setIdCategorieSecondaire($idCategorieSecondaire)
    {
        $this->idCategorieSecondaire = $idCategorieSecondaire;

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

    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    public function getDateDepassee()
    {
        return $this->dateDepassee;
    }

    public function setDateDepassee($dateDepassee)
    {
        $this->dateDepassee = $dateDepassee;

        return $this;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;liste
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

    public function getIdGroupe()
    {
        return $this->idGroupe;
    }

    public function setIdGroupe($idGroupe)
    {
        $this->idGroupe = $idGroupe;

        return $this;
    }

    function ajouter_dans_db(){
        $result = mysqli_query($co, "INSERT INTO proposition(nompropo,descCourte,descLongue,catprinc,catsec,dateLimite,dateDepassee,nbSignalement,dateCreation,ID,idGroupe) VALUES('$this->nom','$this->descriptionCourte','$this->descriptionLongue', '$this->idCategoriePrimaire', '$this->idCategorieSecondaire', '$this->dateLimite', '$this->dateDepassee', '$this->nbSignalement', '$this->dateCreation', '$this->idUtilisateur', '$this->idGroupe')") or die ("Exécution de la requête impossible".mysqli_error($co));
        $id = $mysqli->insert_id;
    }

    function modifier_dans_db(){
        $result = mysqli_query($co, "UPDATE proposition SET nompropo='$this->nom',descCourte='$this->descriptionCourte',descLongue='$this->descriptionLongue',catprinc='$this->idCategoriePrimaire',catsec='$this->idCategorieSecondaire',dateLimite='$this->dateLimite',dateDepassee='$this->dateDepassee',nbSignalement='$this->nbSignalement',dateCreation='$this->dateCreation',ID='$this->idUtilisateur',IDGroupe='$this->idGroupe' WHERE IDPropo='$this->id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }
	
	function supprimer_dans_db(){
        $result = mysqli_query($co, "DELETE FROM proposition WHERE IDPropo='$this->id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

}

?>