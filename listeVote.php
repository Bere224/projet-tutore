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
			if($vote->estPour() == 1) {
				$this->nbrPour++;
			} else {
				$this->nbrContre++;
			}
		}
	}

	function getNbrPour(){
		return $this->nbrPour;
	}

	function getNbrContre(){
		return $this->nbrContre;
	}

	function getVotes(){
		return $this->votes;
	}

}

?>