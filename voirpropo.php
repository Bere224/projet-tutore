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

<h1> <?php echo $propo->getNom(); ?> </h1>

<?php
echo $propo->getDescriptionCourte();
echo $propo->getDescriptionLongue();
echo categorie::id_vers_nom($propo->getIdCategoriePrimaire(),$propo->getIdGroupe());
echo categorie::id_vers_nom($propo->getIdCategorieSecondaire(),$propo->getIdGroupe());

$listeVote = listeVoteFactory::listeVotePourProposition($propo->getId());

echo "pour" . $listeVote->getNbrPour();
echo "contre" . $listeVote->getNbrContre();

if(($listeVote->getNbrPour()+$listeVote->getNbrContre()) > 0)
{
echo 100*$listeVote->getNbrPour()/($listeVote->getNbrPour()+$listeVote->getNbrContre()) . "% pour";

}
if($propo->estVotable())
{
?>

<a href="/projet/projet-tutore/newvote.php?pour=1&idProposition=<?php echo $_GET['idPropo']?>">Pour</a>
<a href="/projet/projet-tutore/newvote.php?pour=0&idProposition=<?php echo $_GET['idPropo']?>">Contre</a>

<?php
}
?>

<a href="signalerproposition.php?id=<?php echo $propo->getId() ?>">SIGNALER</a>

<h2> Commentaires : </h2>
<?php
$listecom = listeCommentaireFactory::listeCommentairePourProposition($propo->getId());
?>
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

<form method="post" action="newcommentaire.php?idPropo=<?php echo $propo->getId() ?>">
    <input type="text" name="texte">
    <input type="submit">
</form>
        
        
