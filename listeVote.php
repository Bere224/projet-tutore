<?php
require_once("vote.php");

class listeVote {
	private $nbrPour;
	private $nbrContre;
	private $votes;

	function __construct($votes) {
		$this->votes = $votes;
		$this->nbrPour = 0;
		$this->nbrContre = 0;

		foreach ($votes as $vote){
			if($vote.estPour()) {
				$this->nbrPour++;
			}
			else {
				$this->nbrContre++;
			}
		}
	}

	function getNbrPour(){
		return $this->nbrPour;
	}

	function getNbrContre(){
		return $this->nbrPour;
	}

	function getVotes(){
		return $this->votes;
	}

}

?>