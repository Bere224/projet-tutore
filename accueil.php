<?php
require_once("connect.php");


if($idConnecte==-1){
    header("Location:home.php");
}
?>



<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>accueil </title>
        <link rel="stylesheet" type="text/css" href="css2.css" />
    </head>
    <body>
        <?php
        require_once("listeGroupeFactory.php");
        require_once("listeGroupe.php");

        require_once("email.php");
        require_once("emailFactory.php");

        echo 'test';
        ?>

        <form method="post" action="groupe.php" > 
            <?php
            $listeGroupe = listeGroupeFactory::listeGroupesPourUtilisateur($idConnecte);
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
