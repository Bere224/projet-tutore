<?php
require_once("utilisateur.php");

class listeUtilisateur {
	private $utilisateurs;

	function __construct($utilisateurs) {
		$this->utilisateurs = $utilisateurs;
	}

	public function getNbrUtilisateurs(){
		return count($this->utilisateurs);
	}

	public function getUtilisateurs(){
		return $this->utilisateurs;
	}

	public function estDans($utilisateur){
		foreach ($utilisateurs as $iter) {
			if($iter->getId() == $utilisateur->getId()) {
				return true
			}
		}
		return false;
	}

}

?>