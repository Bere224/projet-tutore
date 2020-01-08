<?php
require_once("connect.php");

require_once("utilisateur.php");
require_once("utilisateurFactory.php");
require_once("listeGroupeFactory.php");
require_once("listeGroupe.php");
require_once("GroupeFactory.php");
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
		$id=$_POST['iddugroupe'];
		$grp=groupeFactory::charger($id); 
		$Nomgrp= $grp->getNom();
	?>

<h1>  <?php echo "$Nomgrp" ?> </h1>;

	

		<h2> listes des propositions : </h2>
        <form method="post" action="voirpropo.php" > 
            <?php
            $listepropo = listePropositionFactory::listePropositionPourGroupe($id);
            ?>
            <table>
                <tr>
                    <th>id</th>
                    <th>libelle</th>
					<th>description courte</th
                </tr>
                <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                foreach ($listepropo->getProposition() as $proposition)
                {
                ?>
                <tr>
                    <td><?php echo $proposition->getId() ?></td>
                    <td><button type="SUBMIT" name="iddugroupe" value="<?php echo $proposition->getId() ?>"> <?php echo $proposition->getNom() ?></button> </td>
                    <td> <?php echo $proposition->getDescriptionCourte() ?> </td>
                </tr>
                <?php } ?>
            </table>
        </form>
		
		
		
		<h2> groupes possédés: </h2>
        <form method="post" action="groupeadmin.php" > 
            <?php
            $listecommentaires = listeGroupeFactory::listeGroupesPossedeParUtilisateur($idConnecte);
            ?>
            <table>
                <tr>
                    <th>id</th>
                    <th>libelle</th>
                </tr>
                <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                foreach ($listeGroupe->getGroupes() as $groupe)
                {
                ?>
                <tr>
                    <td><?php echo $groupe->getId() ?></td>
                    <td><button type="SUBMIT" name="iddugroupe" value="<?php echo $groupe->getId() ?>"> <?php echo $groupe->getNom() ?></button> </td>
                   
                </tr>
                <?php } ?>
            </table>
        </form>
		
		

    </body>

</html>