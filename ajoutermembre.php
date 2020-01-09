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

    $titrePage="Inviter un nouveau membre dans le groupe";
    require_once('head.php');
    ?>
    <body>
        <div class="overboite">
            <div class="boite">
                <h1> Envoyer une invitation </h2>
                <form method="post" action="newdemandemembre.php" > 
                    <div class="form_espacement">
                        <label class="labelinputtext"> Email :  </label>
                        <input  type="email" class="inputtext" name="email" required></input>
                        <input class="bouttonarrondi" type="submit" Value="Envoyer">
                        <input  type="hidden" name="idGroupe" value="<?php echo $_GET['idGroupe']; ?>"> 
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
