<?php
    require_once("connect.php");
    


class propositionFactory {

    public static function creer($nom, $descriptionCourte, $descriptionLongue, $idCategoriePrimaire, $idCategorieSecondaire, $dateLimite, $idUtilisateur, $idGroupe) {
        $prop = new proposition(0,$id ,$descriptionCourte, $descriptionLongue, $idCategoriePrimaire, $idCategorieSecondaire, 0, $dateLimite, false, date('Y-m-d'),$idUtilisateur,$idGroupe);

        //todo check conflit

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