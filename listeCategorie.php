<?php
require_once("connect.php");

class listeCategorie {
	private $categories;

	function __construct($categories) {
		$this->categories = $categories;
	}

	function getCategories(){
		return $this->categories;
	}

}

?>