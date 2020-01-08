<?php
require_once("connect.php");

require_once("ListeUtilisateur.php");
require_once("ListeUtilisateurFactory.php");
require_once("utilisateur.php");
require_once("utilisateurFactory.php");
require_once("listeGroupeFactory.php");
require_once("listeGroupe.php");
require_once("GroupeFactory.php");
require_once("listeCategorieFactory.php");
if($idConnecte==-1){
    header("Location:home.php");
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>voirgroupe.php </title>
        <link rel="stylesheet" type="text/css" href="css2.css" />
    </head>
    <body>
        <?php
        require_once("listeGroupeFactory.php");
        require_once("listeGroupe.php");

        require_once("listePropositionFactory.php");
        require_once("propositionFactory.php");
		 require_once("proposition.php");
        require_once("listeCommentaireFactory.php");
		 require_once("listeCommentaire.php");
        require_once("emailFactory.php");
		?>
		
	<?php 	
		$id=$_GET['iddugroupe'];
		$grp=groupeFactory::charger($id); 
		$Nomgrp= $grp->getNom();
	?>

    <h1>  <?php echo "$Nomgrp" ?> </h1>



	<h2> Listes des propositions : </h2>
    <?php
    $listepropo = listePropositionFactory::listePropositionPourGroupe($id);
    ?>
    <table>
        <tr>
            <th>id</th>
            <th>libelle</th>
			<th>description courte</th>
			<th>catégorie</th>
            <th>catégorie secondaire</th>
			<th>Supprimer proposition</th>

        </tr>
        <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
        foreach ($listepropo->getProposition() as $proposition)
        {
        ?>
        <tr>
            <td><?php echo $proposition->getId() ?></td>
            <td> <a href="voirpropo.php?idPropo=<?php echo $proposition->getId() ?>" ><button> <?php echo $proposition->getNom() ?></button> </a> </td>
            <td> <?php echo $proposition->getDescriptionCourte() ?> </td>
            <td> <?php echo categorie::id_vers_nom($proposition->getIdCategoriePrimaire(),$id) ?> </td>
            <td> <?php echo categorie::id_vers_nom($proposition->getIdCategorieSecondaire(),$id) ?> </td>
	        <td> <a href="suppProposition.php?idpropo=<?php echo $proposition->getId() ?>" class="button">supprimer </a> </td>

        </tr>
        <?php } ?>
    </table>

    <a href="creerpropo.php?idGroupe=<?php echo $id ?>" class="button">Ajouter une proposition </a>        
	
	
	
	<h2> Membres du groupe </h2>
        <?php
        $listemembre = listeUtilisateurFactory::listeUtilisateurPourGroupe($id);
        ?>
        <table>
            <tr>
                <th>nom</th>
                <th>prenom</th>
				<th>exclure membre </th>

            </tr>
            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
            foreach ($listemembre->getUtilisateur() as $utilisateur)
            {
            ?>
            <tr>
                <td><?php echo $utilisateur->getNom() ?></td>
                <td><?php echo $utilisateur->getPrenom() ?> </td>
                <td><a href="retirermembre.php?idUtilisateur=<?php echo $utilisateur->getId() ?>&idGroupe=<?php echo $id ?>">EXCLURE</a></td>                   
            </tr>
            <?php } ?>
        </table>
	
		<a href="ajoutermembre.php?idGroupe=<?php echo $id ?>" class="button">Ajouter un membre </a>		

        <h2> Listes des catégories : </h2>
        <?php
        $listecat = listeCategorieFactory::listeCategoriesPourGroupe($id);
        ?>
        <table>
            <tr>
                <th>id</th>
                <th>libelle</th>

            </tr>
            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
            foreach ($listecat->getCategories() as $categorie)
            {
            ?>
            <tr>
                <td><?php echo $categorie->getId() ?></td>
                <td> <?php echo $categorie->getNom() ?> </td>

            </tr>
            <?php } ?>
        </table>

        <a href="creercategorie.php?idGroupe=<?php echo $id ?>" class="button">Ajouter categorie </a>        

    </body>

</html>