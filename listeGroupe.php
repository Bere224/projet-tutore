<?php
require_once("groupe.php");

class listeGroupe {
	private $groupes;

	function __construct($groupes) {
		$this->groupes = $groupes;
	}

	function getNbrGroupes(){
		return count($this->groupes);
	}

	function getGroupes(){
		return $this->groupes;
	}

}

?>