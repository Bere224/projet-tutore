<?php
require_once("connect.php");

require_once("listeCommentaireFactory.php");
require_once("listePropositionFactory.php");
require_once("categorie.php");
require_once("utilisateur.php");

?>

    <h2> Listes des propositions signalées : </h2>
        <?php
        $listepropo = listePropositionFactory::listePropositionSignalement();
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
                <td> <?php echo categorie::id_vers_nom($proposition->getIdCategoriePrimaire(),$proposition->getId()) ?> </td>
                <td> <?php echo categorie::id_vers_nom($proposition->getIdCategorieSecondaire(),$proposition->getId()) ?> </td>
                <td> <a href="suppProposition.php?idpropo=<?php echo $proposition->getId() ?>" class="button">supprimer </a> </td>
            </tr>
            <?php } ?>
        </table>

    <h2> Listes des commentaire signalés : </h2>
        <?php
        $listecom = listeCommentaireFactory::listeCommentaireSignalement();
        ?>
        <table>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>texte</th>
                <th>supprimer</th>
            </tr>
            <?php  //On affiche les lignes du tableau une à une à l'aide d'une boucle
            foreach ($listecom->getCommentaires() as $commentaire)
            {
            ?>
            <tr>
                <td><?php echo $commentaire->getId() ?></td>
                <td><?php echo utilisateur::id_vers_nom($commentaire->getIdUtilisateur()) ?></td>
                <td><?php echo $commentaire->getTexte() ?></td>
                <td> <a href="suppCommentaire.php?idcommentaire=<?php echo $commentaire->getId() ?>" class="button">supprimer </a> </td>
            </tr>
            <?php } ?>
        </table>
