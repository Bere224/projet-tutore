<?php


//require_once("mail_func.php");
//require_once("account_func.php");
//require_once("extra_email_func.php");

$error=''; // Variable To Store Error Message
if (isset($_POST['subject']) && $_POST['subject'] == 'inscription')
{
  #$_SESSION['login_user']="NULL";

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['conf_password']) 
  {
    var_dump($_POST);
    missing_param_fatal_error("missing data");
  }
  else
  {

    #echo password_hash("toto", PASSWORD_DEFAULT);
    #$test = password_hash("toto", PASSWORD_DEFAULT);

    // Define $username and $password
	$login= filter_var($_POST['login'],FILTER_SANITIZE_STRING);
    $nom = filter_var($_POST['nom'],FILTER_SANITIZE_STRING);
    $prenom = filter_var($_POST['prenom'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $conf_password = filter_var($_POST['conf_password'],FILTER_SANITIZE_STRING);

    $login=$prenom;
    $accountStatus=-DEFAULT_ACCOUNT_STATUS;// acount status to mark as not validated


    $account_id = account_try_get_id_by_email($email);

    if($conf_password != $password)
    {
      $retour='<span style="color:red">Retapez votre mot de passe</span>';
    }


    if($account_id != -1)
    {
      $retour='<span style="color:red">Adresse mail deja utilisee</span>';
    }
    else
    {

      $hashed_password = password_hash($password, PASSWORD_DEFAULT) ;


      account_add($nom,$prenom,$email,$login,$hashed_password,$accountStatus);


      $account_id = account_try_get_id_by_email($email);
      if($account_id == -1)
      {
        safety_fatal_error("account could not be created");
      }

      //hash the ID to create a secret
      $secret = password_hash($account_id, PASSWORD_DEFAULT);

      $subject = "Confirmation de votre addresse mail";
      $message = "<a href=\"http://localhost/email_confirm.php?email=".$email."&secret=".$secret."\">Cliquez ici pour valider votre compte</a>";
    

      if(extra_email_exists($email))
      {
        extra_email_delete($email);
      }


      //TODO: replace mail with $username (debug) 
      if(!send_mail($email, $subject, $message))
      {
        $retour='<span style="color:green">Un email de confirmation à été envoyé</span>';
      } else 
      {
        $retour='<span style="color:red">Un email de confirmation à été envoyé, mais il pourrait y avoir un problème</span>';
      }
    }
	


  }
}

?>