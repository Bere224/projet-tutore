<?php
require_once("connect.php");

require_once("groupeFactory.php");
?>

<!doctype html>
<html lang="fr">
    <?php
    $groupe = groupeFactory::charger($_GET['idGroupe']);

    if($idConnecte == $groupe->getIdUtilisateur())
    {
        $retourPage="/projet/projet-tutore/voirgroupeadmin.php?iddugroupe=".$_GET['idGroupe'];
    }
    else
    {
        $retourPage="/projet/projet-tutore/voirgroupe.php?iddugroupe=".$_GET['idGroupe'];
    }
    $titrePage="Créer une catégorie";
    require_once('head.php');
    ?>
    <body>
        <div class="overboite">
            <div class="boite">
                <h1> Creer une catégorie </h1>
                <form method="post" action="newcategorie.php" > 
                    <div class="form_espacement">
                        <label class="labelinputtext"> Nom de la catégorie :  </label>
                        <input  type="text" class="inputtext" name="nom" required></input>
                        <input class="bouttonarrondi" type="submit" Value="Créer">
                        <input  type="hidden" name="idGroupe" value=<?php echo $_GET['idGroupe']; ?>> 
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>