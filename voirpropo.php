<?php
require_once("connect.php");

require_once("ListeUtilisateur.php");
require_once("ListeUtilisateurFactory.php");
require_once("utilisateur.php");
require_once("utilisateurFactory.php");
require_once("listeGroupeFactory.php");
require_once("listeGroupe.php");
require_once("listePropositionFactory.php");
require_once("groupeFactory.php");
require_once("listeCategorieFactory.php");
require_once("propositionFactory.php");
require_once("listeCommentaireFactory.php");


require_once("listeVoteFactory.php");

if($idConnecte==-1){
    header("Location:home.php");
}



$propo = propositionFactory::charger($_GET['idPropo']);

?>
<link rel="stylesheet" type="text/css" href="css2.css" />
<div id="container_propo">
<h1> <?php echo $propo->getNom(); ?> </h1>

<div id=container_descCourte><p><?php echo $propo->getDescriptionCourte(); ?></p></div>
<div id=container_descCourte><p><?php echo $propo->getDescriptionLongue(); ?></p></div>
</div>


<div id="container_cat">
    <p><?php echo categorie::id_vers_nom($propo->getIdCategoriePrimaire(),$propo->getIdGroupe());?></p>
<p><?php echo categorie::id_vers_nom($propo->getIdCategorieSecondaire(),$propo->getIdGroupe());?></p>
</div>

<?php
$listeVote = listeVoteFactory::listeVotePourProposition($propo->getId());
?>

<div id="container_vote">
<p><?php echo "Pour : " . $listeVote->getNbrPour();?></p>
<p><?php echo "Contre : " . $listeVote->getNbrContre();?></p>



 <?php
if(($listeVote->getNbrPour()+$listeVote->getNbrContre()) > 0)
{
?>
<p><?php echo 100*$listeVote->getNbrPour()/($listeVote->getNbrPour()+$listeVote->getNbrContre()) . "% pour"; ?></p>

<?php
}

if($propo->estVotable())
{
?>



<p><a href="/projet/projet-tutore/newvote.php?pour=1&idProposition=<?php echo $_GET['idPropo']?>"><img src="/projet/projet-tutore/pour.jpg" width=100px></a>
<a href="/projet/projet-tutore/newvote.php?pour=0&idProposition=<?php echo $_GET['idPropo']?>"><img src="/projet/projet-tutore/contre.jpg" width=100px></a></p>

<?php
}
?>


<p><a href="signalerproposition.php?id=<?php echo $propo->getId() ?>">SIGNALER</a></p>

</div>
<div id="container_comm">
<h2> Commentaires : </h2>
</div>
<?php
$listecom = listeCommentaireFactory::listeCommentairePourProposition($propo->getId());
?>
<div id="container_tab_comm">
<table>
    <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
    foreach ($listecom->getCommentaires() as $commentaire)
    {
    ?>

    
    <tr>
        <td><?php echo utilisateur::id_vers_nom($commentaire->getIdUtilisateur()) ?></td>
    </tr>
    <tr>
        <td><?php echo $commentaire->getTexte() ?></td>
    </tr>
    <tr>
        <td><a href="signalercommentaire.php?id=<?php echo $commentaire->getId() ?>">SIGNALER</a></td>
    </tr>
    <?php } ?>
</table>
</div>
<form id="form_comm" method="post" action="newcommentaire.php?idPropo=<?php echo $propo->getId() ?>">
    <input type="text" name="texte">
    <input type="submit">
</form>

        
