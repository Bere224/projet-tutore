<?php
require_once("connect.php");
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ajouter</title>
    <link rel="stylesheet" type="text/css" href="css2.css" />
</head>
<body>
    <div id="container" >
        <h2> Entrez l'adresse mail du membre à ajouter </h2>
            <form method="post" action="newdemandemembre.php" > 
                <label> Mail :  </label>
                <input  type="email" id="email" name="email"> 
                <br/>               
                <input class="button" type="submit" Value="ajouter">
                <input  type="hidden" name="idGroupe" value="<?php echo $_GET['idGroupe']; ?>"> 
            </form>
        </div>
    </body>
</html>
