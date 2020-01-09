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
    $id=$_GET['idGroupe'];
    $grp=groupeFactory::charger($id); 
    $Nomgrp= $grp->getNom();
    ?>

    <?php
    $retourPage="/projet/projet-tutore/voirgroupeadmin.php?iddugroupe=".$id;
    $titrePage='Voir les signalements du groupe "'.$Nomgrp.'"';
    require_once('head.php');
    ?>
    <body>
        

        <div class="overboite">
            <div class="boitelarge">
                <div class="overboite_flexvertical segmenthauteurmax ">
                    <h1>  Signalement(s) sur "<?php echo "$Nomgrp" ?>" </h1>
                    <div class="segmenttable segmenttable_moinsdemarge segmenttable_pilevertial">
                        <h2> Listes des propositions : </h2>
                        <?php
                        $listepropo = listePropositionFactory::listePropositionSignalement($id);
                        ?>
                        <table class="tablelargeurmax">
                            <tr>
                                <th class="thtdlargeur14">libelle</th>
                                <th class="thtdlargeur14">description courte</th>
                                <th class="thtdlargeur14">catégorie</th>
                                <th class="thtdlargeur14">catégorie secondaire</th>
                                <th class="thtdlargeur14">Nombre de signalement(s)</th>
                                <th class="thtdlargeur14">Remise à zero</th>
                                <th class="thtdlargeur14">Suppression</th>

                            </tr>
                            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                            foreach ($listepropo->getProposition() as $proposition)
                            {
                            ?>
                            <tr>
                                <td> <a href="voirpropo.php?idPropo=<?php echo $proposition->getId() ?>&retoursignalements" ><button class="bouton_liste_propo_titre"><?php echo $proposition->getNom() ?></button> </a> </td>
                                <td> <?php echo $proposition->getDescriptionCourte() ?> </td>
                                <td> <?php echo categorie::id_vers_nom($proposition->getIdCategoriePrimaire(),$id) ?> </td>
                                <td> <?php echo categorie::id_vers_nom($proposition->getIdCategorieSecondaire(),$id) ?> </td>
                                <td> <?php echo $proposition->getNbSignalement() ?> </td>
                                <td> <a href="rezsignalementproposition.php?idpropo=<?php echo $proposition->getId() ?>"><button class="bouton_liste_propo_supprimer">Ignorer</button></a> </td>
                                <td> <a href="suppProposition.php?idpropo=<?php echo $proposition->getId() ?>&retoursignalements"><button class="bouton_liste_propo_supprimer">supprimer</button></a> </td>

                            </tr>
                            <?php
                            }
                            if(count($listepropo->getProposition()) == 0)
                            {
                                ?>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>Aucune proposition signalé</td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    </tr> 

                                <?php
                            }
                            ?>
                        </table>
                    </div>
                
                    <div class="segmenttable segmenttable_moinsdemarge segmenttable_pilevertial">
                        <h2> Listes des commentaire : </h2>
                        <?php
                        $listecom = listeCommentaireFactory::listeCommentaireSignalement($id);
                        ?>
                        <table class="tablelargeurmax">
                            <tr>
                                <th class="thtdlargeur20">Nom</th>
                                <th class="thtdlargeur20">Texte</th>
                                <th class="thtdlargeur20">Nombre de signalement(s)</th>
                                <th class="thtdlargeur20">Remise à zero</th>
                                <th class="thtdlargeur20">Supression</th>

                            </tr>
                            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                            foreach ($listecom->getCommentaires() as $commentaire)
                            {
                            ?>
                            <tr>
                                <td> <?php echo utilisateur::id_vers_nom($commentaire->getIdUtilisateur()) ?> </td>
                                <td> <?php echo $commentaire->getTexte() ?> </td>
                                <td> <?php echo $commentaire->getNbSignalement() ?> </td>
                                <td> <a href="rezsignalementcommentaire.php?idcom=<?php echo $commentaire->getId() ?>"><button class="bouton_liste_propo_supprimer">Ignorer</button></a> </td> 
                                <td> <a href="suppCommentaire.php?idcommentaire=<?php echo $commentaire->getId() ?>&retoursignalements"><button class="bouton_liste_propo_supprimer">supprimer</button></a> </td>

                            </tr>
                            <?php
                            }
                            if(count($listecom->getCommentaires()) == 0)
                            {
                                ?>
                                <tr>
                                <td> </td>
                                <td> </td>
                                <td>Aucun commentaire signalé</td>
                                <td> </td>
                                <td> </td>
                                </tr> 
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </body>

</html>