<?php
require_once("commentaire.php");

class listeCommentaire {
	private $commentaires;

	function __construct($commentaires) {
		$this->commentaires = $commentaires;
	}

	function getNbrCommentaires(){
		return count($this->commentaires);
	}

	function getCommentaires(){
		return $this->commentaires;
	}

}

?>