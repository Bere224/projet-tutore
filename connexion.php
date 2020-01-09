<?php
require_once("connect.php");
?>

<?php 
    $titrePage="Rejoignez nous !";

?>


<!doctype html>
<html lang="fr">
  <?php
  $titrePage="Rejoignez-nous";
  require_once('head.php');
  $login = "";
  if(isset($_GET['login'])) {$login=$_GET['login'];}

  ?>
  <body>
    <div class="overboite">
        <div class="boite">
          <form method = "post" action="newconnection.php">
            <h1>Connexion</h1>
            <div class="form_espacement form_espacement_label_gauche">
                <label for="nom" class="inputlabel">Nom d'utilisateur</label>
                <input type = "text" name="username" class="inputtext" autocomplete = "on" placeholder="Nom" value="<?php echo $login ?>" <?php if($login == "") echo "autofocus" ?> required>

                <label for="password">mot de passe </label>
                <input type="password" name ="password" class= "inputtext" placeholder="Mot de passe" <?php if($login != "") echo "autofocus" ?> required>

                <input type="submit" id='submit' class="bouttonarrondi" value='valider' >
              </div>
          </form>
          <a class="bouttonarrondi_alternatif" href="inscription.php">Créer un compte</a>
      </div>
    </div>
  </body>

</html>

