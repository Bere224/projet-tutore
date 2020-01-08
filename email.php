<?php
require_once("emailEnvoi.php");

class email {
	private $titre;
	private $texte;
	private $adresseMail;

	function __construct($titre, $texte, $adresseMail) {
		$this->titre = $titre;
		$this->texte = $texte;
		$this->adresseMail = $adresseMail;
	}

	function envoyer(){
		$envoi = new emailEnvoi();
		$envoi->envoyer_email($this->adresseMail,$this->titre,$this->texte);
		echo"$this->adresseMail,$this->titre,$this->texte";
	}

}

?>