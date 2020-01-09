<?php
require_once("connect.php");

require_once("utilisateurFactory.php");
require_once("listeGroupeFactory.php");
require_once("emailFactory.php");

if($idConnecte==-1){
    header("Location:home.php");
}
?>



<!doctype html>
<html lang="fr">
    <?php
    $titrePage="Accueil";
    require_once('head.php');
    ?>
    <body>
        <div class="overboite">
            <div class="boite">


        		<?php
                $utilisateur= utilisateurFactory::charger($idConnecte); 
                $Nom= $utilisateur->getNom(); 
                $prenom= $utilisateur->getPrenom(); 
                ?>

                <h1>  Bienvenue <?php echo "$Nom $prenom" ?> </h1>

                <div class="segmenttable">

            		<h2> Vous participez à : </h2>
                    <?php
                    $listeGroupe = listeGroupeFactory::listeGroupesPourUtilisateur($idConnecte);
                    ?>
                    <table class="tablelargeurmax">
<!--                        <tr>
                            <th class="thtdlargeur50">id</th>
                            <th class="thtdlargeur50">libelle</th>
                        </tr> -->
                        <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                        foreach ($listeGroupe->getGroupes() as $groupe)
                        {
                        ?>
                            <tr>
<!--                                <td class="thtdlargeur50"><?php //echo $groupe->getId() ?></td>  -->
                                <td class="thtdlargeur50"><a href="voirgroupe.php?iddugroupe=<?php echo $groupe->getId() ?>"> <button class="bouttonarrondi_blanc"> <?php echo $groupe->getNom() ?></button> </a> </td>
                               
                            </tr>
                        <?php
                        }
                        if(count($listeGroupe->getGroupes()) == 0)
                        {
                            ?>
                            <tr>
<!--                                <td class="thtdlargeur50">Aucun</td> -->
                                <td class="thtdlargeur50">Aucun</td>
                            </tr> 

                            <?php
                        }
                        ?>
                    </table>

                </div>    		
        		
                <div class="segmenttable">

            		<h2> Vous administrez: </h2>
                    <?php
                    $listeGroupe = listeGroupeFactory::listeGroupesPossedeParUtilisateur($idConnecte);
                    ?>
                    <table class="tablelargeurmax">
<!--                        <tr>
                            <th class="thtdlargeur50">id</th>
                            <th class="thtdlargeur50">libelle</th>
                        </tr>  -->
                        <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                        foreach ($listeGroupe->getGroupes() as $groupe)
                        {
                        ?>
                        <tr>
<!--                            <td class="thtdlargeur50"><?php //echo $groupe->getId() ?></td> -->
                            <td class="thtdlargeur50"><a href="voirgroupeadmin.php?iddugroupe=<?php echo $groupe->getId() ?>"> <button class="bouttonarrondi_blanc"> <?php echo $groupe->getNom() ?></button> </a> </td>
                           
                        </tr>
                        <?php
                        }
                        if(count($listeGroupe->getGroupes()) == 0)
                        {
                            ?>
                            <tr>
<!--                                <td class="thtdlargeur50">Aucun</td> -->
                                <td class="thtdlargeur50">Aucun</td>
                            </tr> 

                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="segmenttable">
                    <table class="tablelargeurmax">
                        <tr>
                            <td class="thtdlargeur50"><a class="bouttonarrondi" href="/projet/projet-tutore/deconnexion.php">Se déconnecter</a></td>
                            <td class="thtdlargeur50"><a class="bouttonarrondi" href="/projet/projet-tutore/creergroupe.php">Créer un groupe</a></td>                            
                        </tr>
                    </table>
                </div>
                
                


            </div>
        </div>
    </body>

</html>
