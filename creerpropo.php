<?php
require_once("connect.php");
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>inscription</title>
		<link rel="stylesheet" type="text/css" href="css2.css" />
	</head>
	<body>
		<div id="container" >
			<h2> Créer une nouvelle proposition </h2>
			<form method="post" action="newpropo.php"> 
				<input type="hidden" name="idGroupe" value="<?php $_GET['idPropo'] ?>">
				<input type="text" name="nompropo">
				<br/>
				<br/>
				<label> Description courte </label>
				<TEXTAREA name="desccourte" rows=4 cols=54>courte déscription</TEXTAREA>
				<br/>
				<br/>
				<label> Description longue </label>
				<TEXTAREA name="desclongue" rows=8 cols=54>décrivez</TEXTAREA>
				<br/>
				<br/>
				<label> Catégorie principale </label>
				<select name="catprinc" size="1">
					<option>cat1
					<option>cat2
					<option>cat3
					<option>cat4
					<option>cat5
				</select>
				<br/>
				<br/>
				<label> Catégorie secondaire (optionel) </label> 
				<select name="catsec" size="1">
					<option>aucune
					<option>cat1
					<option>cat2
					<option>cat3
					<option>cat4
					<option>cat5
				</select>
				<br/>
				<br/>
				Sans <input type="radio" name="datechoix" checked value="sans" >
				Avec <input type="radio" name="datechoix" value="avec" >
				<label> date de cloture </label>
				<br/>
				<br/>
				<label> Si oui veuillez rensseigner la date de cloture </label>
				<input type="date" name="datedecloture">
				<br/>
				<br/>
				<button class="button" type="submit" Value="créer"></button>
			</form>
		</div>
    </body>
</html>
