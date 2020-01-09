<?php
require_once("utilisateur.php");
require_once("utilisateurFactory.php");

class listeUtilisateur {
	private $utilisateur;

	function __construct($utilisateur) {
		$this->utilisateur = $utilisateur;
	}

	public function getNbrUtilisateur(){
		return count($this->utilisateur);
	}

	public function getUtilisateur(){
		return $this->utilisateur;
	}

	public function ajouterParId($id){
		$this->utilisateur[] = utilisateurFactory::charger($id);
	}

	public function estDans($utilisateur){
		foreach ($utilisateur as $iter) {
			if($iter->getId() == $utilisateur->getId()) {
				return true;
			}
		}
		return false;
	}

}

?>