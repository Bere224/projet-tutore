<?php

require_once("connect.php");

class utilisateur {
	private $id;
	private $login;
	private $nom;
	private $prenom;
	private $mail;
	private $mdp;
	private $dateArrivee;
    private $valide;
    private $nbSignalement;

	function __construct($id, $login, $nom, $prenom, $mail, $mdp, $dateArrivee, $valide, $nbSignalement) {
		$this->id = $id;
		$this->login = $login;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->mail = $mail;
		$this->mdp = $mdp;
		$this->dateArrivee = $dateArrivee;
        $this->valide = $valide;
        $this->nbSignalement = $nbSignalement;
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

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

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

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    public function getValide()
    {
        return $this->valide;
    }

    public function setValide($valide)
    {
        $this->valide = $valide;

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


    static function id_vers_nom($idUtilisateur){
        global $co;
        $reponse = mysqli_query($co, "SELECT nom FROM utilisateur where ID='$idUtilisateur'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            return $donnees['nom'];
        }

        return 'Anonyme';
    }


    function ajouter_dans_db(){
		global $co;
        $result = mysqli_query($co, "INSERT INTO utilisateur(Login,mail,mdp,nom,prenom,valide,dateInscription,nbSignalement) VALUES('$this->login','$this->mail','$this->mdp', '$this->nom', '$this->prenom', '$this->valide', '$this->dateArrivee', '$this->nbSignalement')") or die ("Exécution de la requête impossible".mysqli_error($co));
        $this->id = $co->insert_id;
    }
    function modifier_dans_db(){
		global $co;
        $result = mysqli_query($co, "UPDATE utilisateur SET Login='$this->login', mail='$this->mail', mdp='$this->mdp', nom='$this->nom', prenom='$this->prenom', valide='$this->valide', dateInscription='$this->dateArrivee', nbSignalement='$this->nbSignalement' WHERE ID='$this->id'") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

	function supprimer_dans_db(){
        $result = mysqli_query($co, "DELETE FROM utilisateur WHERE ID='$this->id')") or die ("Exécution de la requête impossible".mysqli_error($co));
    }

}

?>