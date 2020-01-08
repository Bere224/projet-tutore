<?php
require_once("proposition.php");

class listeProposition {
	private $propositions;

	function __construct($propositions) {
		$this->propositions = $propositions;
	}

	function getPropositions(){
		return $this->propositions;
	}

}

?>