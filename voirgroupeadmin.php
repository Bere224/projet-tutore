<?php
require_once("connect.php");

require_once("listeUtilisateurFactory.php");
require_once("utilisateurFactory.php");
require_once("listeCategorieFactory.php");
require_once("listePropositionFactory.php");
require_once("propositionFactory.php");
require_once("listeCommentaireFactory.php");
require_once("emailFactory.php");
require_once("groupeFactory.php");

if($idConnecte==-1){
    header("Location:home.php");
}
?>

<!doctype html>
<html lang="fr">
    <?php   
        $id=$_GET['iddugroupe'];
        $grp=groupeFactory::charger($id); 
        $Nomgrp= $grp->getNom();
    ?>

    <?php

    $retourPage="/projet/projet-tutore/accueil.php";
    $titrePage='Administration du groupe "'.$Nomgrp.'"';
    require_once('head.php');
    ?>
    <body>
		

        <div class="overboite">
            <div class="boitecoupeegauche">

                <h2> Membres du groupe </h2>
                <?php
                $listemembre = listeUtilisateurFactory::listeUtilisateurPourGroupe($id);
                ?>
                <div class="segmenttable segmenttable_moinsdemarge segmenttable_pilevertial">
                    <table class="tablelargeurmax">
                        <tr>
                            <th class="thtdlargeur33">nom</th>
                            <th class="thtdlargeur33">prenom</th>
                            <th class="thtdlargeur33">exclure membre </th>

                        </tr>
                        <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                        foreach ($listemembre->getUtilisateur() as $utilisateur)
                        {
                        ?>
                        <tr>
                            <td class="thtdlargeur33"><?php echo $utilisateur->getNom() ?></td>
                            <td class="thtdlargeur33"><?php echo $utilisateur->getPrenom() ?> </td>
                            <td class="thtdlargeur33">
                                 <a href="retirermembre.php?idUtilisateur=<?php echo $utilisateur->getId() ?>&idGroupe=<?php echo $id ?>"><button class="bouton_liste_propo_supprimer">exclure</button></a></td>                   
                        </tr>
                        <?php
                        }
                        if(count($listemembre->getUtilisateur()) == 0)
                        {
                            ?>
                            <tr>
                                <td class="thtdlargeur33"> </td>
                                <td class="thtdlargeur33">Aucun</td>
                                <td class="thtdlargeur33"> </td>
                                </tr> 

                            <?php
                        }
                        ?>
                    </table>
                    </br>
                    <a href="ajoutermembre.php?idGroupe=<?php echo $id ?>" class="bouttonarrondi">Ajouter un membre </a> 

                </div>
            
            </div>      

            <div class="boitecoupeedroite">
                <div class="overboite_flexvertical segmenthauteurmax ">
                    <h1>  <?php echo "$Nomgrp" ?> </h1>
                    <div class="segmenttable segmenttable_moinsdemarge segmenttable_pilevertial">
                    	<h2> Listes des propositions : </h2>
                        <?php
                        $listepropo = listePropositionFactory::listePropositionPourGroupe($id);
                        ?>
                        <table class="tablelargeurmax">
                            <tr>
                                <th class="thtdlargeur20">libelle</th>
                    			<th class="thtdlargeur20">description courte</th>
                    			<th class="thtdlargeur20">catégorie</th>
                                <th class="thtdlargeur20">catégorie secondaire</th>
                    			<th class="thtdlargeur20">Suppression</th>

                            </tr>
                            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                            foreach ($listepropo->getProposition() as $proposition)
                            {
                            ?>
                            <tr>
                                <td class="thtdlargeur20"> <a href="voirpropo.php?idPropo=<?php echo $proposition->getId() ?>" ><button class="bouton_liste_propo_titre"><?php echo $proposition->getNom() ?></button> </a> </td>
                                <td class="thtdlargeur20"> <?php echo $proposition->getDescriptionCourte() ?> </td>
                                <td class="thtdlargeur20"> <?php echo categorie::id_vers_nom($proposition->getIdCategoriePrimaire(),$id) ?> </td>
                                <td class="thtdlargeur20"> <?php echo categorie::id_vers_nom($proposition->getIdCategorieSecondaire(),$id) ?> </td>
                    	        <td class="thtdlargeur20"> <a href="suppProposition.php?idpropo=<?php echo $proposition->getId() ?>"><button class="bouton_liste_propo_supprimer">supprimer</button></a> </td>

                            </tr>
                            <?php
                            }
                            if(count($listepropo->getProposition()) == 0)
                            {
                                ?>
                                <tr>
                                    <td class="thtdlargeur20"> </td>
                                    <td class="thtdlargeur20"> </td>
                                    <td class="thtdlargeur20">Aucune proposition</td>
                                    <td class="thtdlargeur20"> </td>
                                    <td class="thtdlargeur20"> </td>
                                    </tr> 

                                <?php
                            }
                            ?>
                        </table>
                    	</br>
                    	</br>
                        <a href="creerpropo.php?idGroupe=<?php echo $id ?>" class="bouttonarrondi">Ajouter une proposition </a>        
                    </div>
            	
                    <div class="segmenttable segmenttable_moinsdemarge segmenttable_pilevertial">
                        <h2> Listes des catégories : </h2>
                        <?php
                        $listecat = listeCategorieFactory::listeCategoriesPourGroupe($id);
                        ?>
                        <table class="tablelargeurmax">
                            <tr>
                                <th>libelle</th>

                            </tr>
                            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                            foreach ($listecat->getCategories() as $categorie)
                            {
                            ?>
                            <tr>
                                <td> <?php echo $categorie->getNom() ?> </td>

                            </tr>
                            <?php
                            }
                            if(count($listecat->getCategories()) == 0)
                            {
                                ?>
                                <tr>
                                    <td>Aucune catégories</td>
                                </tr> 
                                <?php
                            }
                            ?>
                        </table>
                        </br>
                        <a href="creercategorie.php?idGroupe=<?php echo $id ?>" class="bouttonarrondi">Ajouter categorie </a>        
                    </div>

                    <div class="div_voirsignalements_supprimer">
                        <div class="div_signal_supp_unite"><a href="voirsignalements.php?idGroupe=<?php echo $id ?>" class="bouttonarrondi_signaler">Voir signalements</a></div>        
                        <div class="div_signal_supp_unite"><a href="retirergroupe.php?idGroupe=<?php echo $id ?>" class="bouttonarrondi_signaler" onclick="return confirm('Êtes vous sûr de vouloir supprimer le groupe ?')">Supprimer le groupe</a></div>        
                    </div>
                </div>
            </div>
        </div>
        
    </body>

</html>