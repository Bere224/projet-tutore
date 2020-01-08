<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Créer une catégorie </title>
        <link rel="stylesheet" type="text/css" href="css2.css" />
    </head>
    <body>
        <div id="container" >
            <h2> Entrez le nom de la catégorie à créer </h2>
            <form method="post" action="newcategorie.php" > 
                <label> Nom de la catégorie :  </label>
                <input  type="text" id="nom" name="nom" > 
                <br/>
                <br/>
               
                <input class="button" type="submit" Value="Créer">
            </form>
        </div>
    </body>
</html>