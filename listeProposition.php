<?php
require_once("proposition.php");

class listeProposition {
	private $proposition;

	function __construct($proposition) {
		$this->proposition = $proposition;
	}

	function getProposition(){
		return $this->proposition;
	}

}

?>