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
    $titrePage='Groupe "'.$Nomgrp.'"';
    require_once('head.php');
    ?>
    <body>
        

        <div class="overboite">
            <div class="boitecoupeegauche">

                <h2> Membres du groupe </h2>
                <?php
                $listemembre = listeUtilisateurFactory::listeUtilisateurPourGroupe($id);
                $listemembre->ajouterParId($grp->getIdUtilisateur());
                ?>
                <div class="segmenttable segmenttable_moinsdemarge segmenttable_pilevertial">
                    <table class="tablelargeurmax">
                        <tr>
                            <th class="thtdlargeur50">nom</th>
                            <th class="thtdlargeur50">prenom</th>

                        </tr>
                        <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                        foreach ($listemembre->getUtilisateur() as $utilisateur)
                        {
                        ?>
                        <tr>
                            <td class="thtdlargeur50"><?php echo $utilisateur->getNom() ?></td>
                            <td class="thtdlargeur50"><?php echo $utilisateur->getPrenom() ?> </td>
                        </tr>
                        <?php
                        }
                        if($listemembre->getNbrUtilisateur() == 0)
                        {
                            ?>
                            <tr>
                                <td class="thtdlargeur50">Aucun</td>
                                <td class="thtdlargeur50">Membre ??</td>
                                </tr> 

                            <?php
                        }
                        ?>
                    </table>

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
                                <th class="thtdlargeur25">libelle</th>
                                <th class="thtdlargeur25">description courte</th>
                                <th class="thtdlargeur25">catégorie</th>
                                <th class="thtdlargeur25">catégorie secondaire</th>

                            </tr>
                            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                            foreach ($listepropo->getProposition() as $proposition)
                            {
                            ?>
                            <tr>
                                <td class="thtdlargeur25"> <a href="voirpropo.php?idPropo=<?php echo $proposition->getId() ?>" ><button class="bouton_liste_propo_titre"><?php echo $proposition->getNom() ?></button> </a> </td>
                                <td class="thtdlargeur25"> <?php echo $proposition->getDescriptionCourte() ?> </td>
                                <td class="thtdlargeur25"> <?php echo categorie::id_vers_nom($proposition->getIdCategoriePrimaire(),$id) ?> </td>
                                <td class="thtdlargeur25"> <?php echo categorie::id_vers_nom($proposition->getIdCategorieSecondaire(),$id) ?> </td>

                            </tr>
                            <?php
                            }
                            if(count($listepropo->getProposition()) == 0)
                            {
                                ?>
                                <tr>
                                    <td class="thtdlargeur25"> </td>
                                    <td class="thtdlargeur25">Aucune proposition</td>
                                    <td class="thtdlargeur25">C'est bien vide !</td>
                                    <td class="thtdlargeur25"> </td>
                                    </tr> 

                                <?php
                            }
                            ?>
                        </table>
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
                    </div>

                    <div class="div_voirsignalements_supprimer">
                        <a href="retirermembre.php?idGroupe=<?php echo $id ?>&idUtilisateur=<?php echo $idConnecte ?>" class="bouttonarrondi_signaler">Quitter le groupe</a>        
                    </div>
                </div>
            </div>
        </div>
        
    </body>

</html>