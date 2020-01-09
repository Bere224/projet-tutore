<?php
    require_once("connect.php");
    
    require_once("proposition.php");


class propositionFactory {

    public static function creer($nom, $descriptionCourte, $descriptionLongue, $idCategoriePrimaire, $idCategorieSecondaire, $dateLimite, $idUtilisateur, $idGroupe) {
        $prop = new proposition(0,$nom ,$descriptionCourte, $descriptionLongue, $idCategoriePrimaire, $idCategorieSecondaire, 0, $dateLimite, 0, date('Y-m-d'),$idUtilisateur,$idGroupe);

        $reponse = mysqli_query($co, "SELECT * FROM proposition WHERE nompropo=$nom AND IDGroupe=$idGroupe") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            return false;
        }       

        return $prop;
    }

    public static function charger($id) {
        global $co;
        
        $result = false;
        
        $reponse = mysqli_query($co, "SELECT * FROM proposition WHERE IDPropo='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            $result = new proposition($donnees['IDPropo'],$donnees['nompropo'],$donnees['descCourte'],$donnees['descLongue'],$donnees['catprinc'],$donnees['catsec'],$donnees['nbSignalement'],$donnees['dateLimite'],$donnees['dateDepassee'],$donnees['dateCreation'],$donnees['ID'],$donnees['IDGroupe']);
        }

        return $result;
    }

}

?>