<?php
require_once("connect.php");

require_once("groupeFactory.php");

require_once("listeCategorieFactory.php");
?>

<!doctype html>
<html lang="fr">
    <?php


    $groupe = groupeFactory::charger($_GET['idGroupe']);

    if($idConnecte == $groupe->getIdUtilisateur())
    {
        $retourPage="/projet/projet-tutore/voirgroupeadmin.php?iddugroupe=".$_GET['idGroupe'];
    }
    else
    {
        $retourPage="/projet/projet-tutore/voirgroupe.php?iddugroupe=".$_GET['idGroupe'];
    }
    $titrePage="Rédiger une proposition";
    require_once('head.php');
    ?>
	<body>
        <div class="overboite">
            <div class="boite">
				<h1> Créer une nouvelle proposition </h2>
				<form method="post" action="newpropo.php"> 
					<div class="form_espacement">
						<input type="hidden" name="idGroupe" value="<?php echo $_GET['idGroupe'] ?>">
						<label> Nom </label>
						<input type="text" class="labelinputtext" name="nompropo" placeholder="Nom" required>
						<label> Description courte </label>
						<TEXTAREA name="desccourte" rows=4 cols=54 placeholder="Courte description"></TEXTAREA> 
						<label> Description longue </label>
						<TEXTAREA name="desclongue" rows=8 cols=54 placeholder="Longue description"></TEXTAREA>
						<label> Catégorie principale </label>
						<select name="catprinc" size="1" value="-1">
					        <?php
					        $listecat = listeCategorieFactory::listeCategoriesPourGroupe( $_GET['idGroupe'] );
					        ?>
				            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
				            foreach ($listecat->getCategories() as $categorie)
				            {
				            ?>
								<option value="<?php echo $categorie->getId() ?>"><?php echo $categorie->getNom() ?></option>
				            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
							}
				            ?>
						</select>
						<label> Catégorie secondaire (optionel) </label> 
						<select name="catsec" size="1">
							<option value="-1">aucune</option>
				            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
				            foreach ($listecat->getCategories() as $categorie)
				            {
				            ?>
								<option value="<?php echo $categorie->getId() ?>"><?php echo $categorie->getNom() ?></option>
				            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
							}
				            ?>
						</select>

						<label> Limite de temps</label>
						<div class="overboite limitelargeur50">
							<div class="input_flex_largeur form_pas_espacement"><label> Sans </label> <input type="radio" name="datechoix" checked value="sans" ></div>
							<div class="input_flex_largeur form_pas_espacement"><label> Avec </label> <input type="radio" name="datechoix" value="avec" ></div>
						</div>
						<label> Date limite </label>
						<input type="date" name="datedecloture" min="<?php echo date('Y-m-d')?>">

	                    <input class="bouttonarrondi" type="submit" Value="créer">
					</div>
				</form>
			</div>
		</div>		
    </body>
</html>
