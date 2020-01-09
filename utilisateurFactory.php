<?php

require_once("utilisateur.php");
require_once("emailFactory.php");
//require_once("connect.php");

class utilisateurFactory {


    public static function inscription($login, $nom, $prenom, $mail, $mdp, $dateArrivee)
    {
        $utilisateur = new utilisateur(0,$login,$nom,$prenom,$mail,$mdp,date('Y-m-d'),0,0);

        $reponse = mysqli_query($co, "SELECT * FROM utilisateur WHERE login=$login") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            return false;
        }
		
		return $utilisateur;
    }

    public static function connexion($login, $mdp)
    {
        global $co;
        
        $result = false;
        
        $id = -1;

        $reponse = mysqli_query($co, "SELECT ID FROM utilisateur WHERE login='$login' AND mdp='$mdp'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            $id = $donnees['ID'];
        }
        //verifier dans DB

        if($id == -1) {
            return false;
        }


        $utilisateur = utilisateurFactory::charger($id);

        if(!$utilisateur->getValide()) {
            return false;
        }

        $_SESSION['idUtilisateur'] = $id;

        return utilisateur;
    }

    public static function charger($id)
    {
        global $co;
        
        $result = false;
        
        $reponse = mysqli_query($co, "SELECT * FROM utilisateur WHERE ID='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            $result = new utilisateur($donnees['ID'],$donnees['Login'],$donnees['nom'],$donnees['prenom'],$donnees['mail'],$donnees['mdp'],$donnees['dateInscription'],$donnees['valide'],$donnees['nbSignalement']);
        }

        return $result;
    }

    public static function chercher($email)
    {
        global $co;
        
        $result = false;
        
        $reponse = mysqli_query($co, "SELECT * FROM utilisateur WHERE mail='$id'") or die ("Exécution de la requête impossible".mysqli_error($co));
        while($donnees = mysqli_fetch_array($reponse))
        {
            $result = new utilisateur($donnees['ID'],$donnees['Login'],$donnees['nom'],$donnees['prenom'],$donnees['mail'],$donnees['mdp'],$donnees['dateInscription'],$donnees['valide'],$donnees['nbSignalement']);
        }

        return $result;
    }


}

?>