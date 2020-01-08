<?php
require_once("email.php");

class emailFactory {

    public static function emailInscription($utilisateur) {
    	$id=$utilisateur->getId();
    	return new email("Inscription sur Demos.com", "Pour vous inscrire, cliquez-<a href=\"http://localhost/projet/projet-tutore/validation.php?id=$id\">ici</a> >", $utilisateur->getMail()); //todo faire mieux
    }

    public static function emailRecuperationMdp($utilisateur) {
    	return new email("Changement de mot de passe sur Demos.com", "Pour changer de mot de passe, cliquez-<a href=\"localhost/projet/projet-tutore/changementmdp.php\">ici</a> >", $utilisateur->getMail()); //todo faire mieux
    }

}

?>