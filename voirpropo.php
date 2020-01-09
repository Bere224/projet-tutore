<?php
require_once("connect.php");

require_once("groupeFactory.php");
require_once("listeUtilisateurFactory.php");
require_once("utilisateurFactory.php");
require_once("listeGroupeFactory.php");
require_once("listePropositionFactory.php");
require_once("listeCategorieFactory.php");
require_once("propositionFactory.php");
require_once("listeCommentaireFactory.php");
require_once("listeVoteFactory.php");

if($idConnecte==-1){
    header("Location:home.php");
}



$propo = propositionFactory::charger($_GET['idPropo']);
$listeVote = listeVoteFactory::listeVotePourProposition($propo->getId());

$pourcentage_dispo = false;
if(($listeVote->getNbrPour()+$listeVote->getNbrContre()) > 0)
{
    $pourcentage_dispo = true;
    $pourcentage_pour = 100*$listeVote->getNbrPour()/($listeVote->getNbrPour()+$listeVote->getNbrContre());
    $pourcentage_contre = 100-$pourcentage_pour;
}


?>


<html lang="fr">
    <?php

    $groupe = groupeFactory::charger($propo->getIdGroupe());

    if(isset($_GET['retoursignalements']))
    {
            $retourPage="/projet/projet-tutore/voirsignalements.php?idGroupe=".$propo->getIdGroupe();

    }
    else
    {
        if($idConnecte == $groupe->getIdUtilisateur())
        {
            $retourPage="/projet/projet-tutore/voirgroupeadmin.php?iddugroupe=".$propo->getIdGroupe();
        }
        else
        {
            $retourPage="/projet/projet-tutore/voirgroupe.php?iddugroupe=".$propo->getIdGroupe();
        }
    }
    $titrePage='Proposition "'.$propo->getNom().'"';
    require_once('head.php');
    ?>
    <body>
        <div class="overboite">
            <div class="boitecoupeegauche">

                <div class="overboite_vertical">

                    <?php if($propo->getDateLimite() != '1999-01-01')
                    {
                        ?>
                        Date limite : <?php echo date("d/m/Y", strtotime($propo->getDateLimite()));  ?>
                        <?php
                    }
                    ?>

                    <?php
                    if($propo->estVotable($idConnecte))
                    {
                    ?>

                        <h2>Je vote :</h2>
                        <div>
                            <a href="/projet/projet-tutore/newvote.php?pour=1&idProposition=<?php echo $_GET['idPropo']?>"><img src="/projet/projet-tutore/pour.jpg" width=200px></a>
                        </div>
                        <div>
                            <a href="/projet/projet-tutore/newvote.php?pour=0&idProposition=<?php echo $_GET['idPropo']?>"><img src="/projet/projet-tutore/contre.jpg" width=200px></a>
                        </div>
            
                    <?php
                    }
                    else
                    {

                    ?>

                        <h2>Vote impossible</h2>

                    <?php
                    }
                    ?>

                </div>

            </div>
            <div class="boitecoupeedroite">






                <h1 class="propo_titre"> <?php echo $propo->getNom(); ?> </h1>

                <div class="proposegment">
                    <label>Catégories</label>
                    <div class="proposegment_pas_padding overboite">
                        <div class="propo_catprinc">
                        <?php echo categorie::id_vers_nom($propo->getIdCategoriePrimaire(),$propo->getIdGroupe());?>
                        </div>
                        <div class="propo_catsec">
                        <?php echo categorie::id_vers_nom($propo->getIdCategorieSecondaire(),$propo->getIdGroupe());?>
                        </div>
                    </div>
                </div>

                <div class="proposegment">
                    <label>Description courte</label>
                    <?php echo $propo->getDescriptionCourte(); ?>
                </div>

                <div class="proposegment">
                    <label>Description détaillée</label>
                    <?php echo $propo->getDescriptionLongue(); ?>
                </div>

                <div class="proposegment">
                    <label>Resultat des votes</label>
                    <?php echo ($listeVote->getNbrPour()+$listeVote->getNbrContre()). " participation(s)"; ?>

                    <?php 
                    if($pourcentage_dispo)
                    {
                    ?>
                        <div class="propo_resultat_overboite overboite">
                            <div style="background-color: green; width: <?php echo $pourcentage_pour ?>%; color: red;">
                                <p></p>
                            </div>
                            <div style="background-color: red; width: <?php echo $pourcentage_contre ?>%; color: green;">
                                <p></p>
                            </div>
                        </div>
                        <?php echo $pourcentage_pour.'% pour ~ ' . $pourcentage_contre.'% contre';?>
                    <?php
                    }
                    ?>

                </div>

                
                <div class="signaler"><a class="bouttonarrondi_signaler" href="signalerproposition.php?id=<?php echo $propo->getId() ?>">SIGNALER</a></div>


                <div class="propo_commentaires">

                    <h2> Commentaires : </h2>

                    <?php
                    $listecom = listeCommentaireFactory::listeCommentairePourProposition($propo->getId());
                    ?>
                    <div id="container_tab_comm">
                        <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
                        foreach ($listecom->getCommentaires() as $commentaire)
                        {
                        ?>
                            <div class="propo_un_commentaire overboite_vertical">
                                <div class="commentaire_nom"><?php echo utilisateur::id_vers_nom($commentaire->getIdUtilisateur()) ?></div>
                                <div class="commentaire_texte"><?php echo $commentaire->getTexte() ?></div>
                                <div><a class="bouttonarrondi_signaler" href="signalercommentaire.php?id=<?php echo $commentaire->getId() ?>">SIGNALER</a></div>
                            </div>
                        <?php
                        }
                        if(count($listecom->getCommentaires()) == 0)
                        {
                        ?>
                            <h3> Pas de Commentaires.</h3>
                        <?php
                        }
                        ?>
                    </div>
                    <form id="form_comm" method="post" action="newcommentaire.php?idPropo=<?php echo $propo->getId() ?>">
                        <textarea type="text" class="inputtext bigtextinput" name="texte" placeholder="Qu'en pensez-vous ?" required></textarea>
                        <input type="submit" class="bouttonarrondi" value="Poster">
                    </form>

        
                </div>



            </div>
        </div>

    </body>
</html>



