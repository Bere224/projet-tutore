<!doctype html>
<html lang="fr">
    <?php
    $retourPage="/projet/projet-tutore/accueil.php";
    $titrePage="Créer un groupe";
    require_once('head.php');
    ?>
    <body>
        <div class="overboite">
            <div class="boite">
                <h1> Entrez le nom du groupe à créer </h1>
                <form method="post" action="newgroupe.php" > 
                    <label class="labelinputtext"> Nom du groupe :  </label> <br/>
                    <input  type="text" class="inputtext" name="nomgrp"></input>
                    <input class="bouttonarrondi" type="submit" Value="Créer">
                </form>
            </div>
        </div>
    </body>
</html>
