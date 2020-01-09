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
  ?>
  <body>
    <div class="overboite">
        <div class="boite">
          <form method = "post" action="newutilisateur.php">
              <h1>Rejoignez-nous !</h1>
              <div class="form_espacement form_espacement_label_gauche">
                <label for="nom" class="inputlabel">Nom </label>
                <input type = "text" name="nom" class="inputtext" autocomplete = "on" placeholder="Nom" autofocus required>

                <label for="prenom">Prénom </label>
                <input type = "text" name="prenom" class="inputtext" autocomplete = "on" placeholder="Prenom" required>

                <label for="email">Email </label>
                <input type = "email" name="email" class="inputtext" autocomplete = "on" placeholder="Email" required>

                <label for="nom">Login </label>
                <input type = "text" name="login" class="inputtext" autocomplete = "on" placeholder="Login" autofocus required>

                <div>

                <label for="password">Choisissez un mot de passe </label>
                <input type="password" name ="password" class= "inputtext" placeholder="Mot de passe" required>

                <label for="conf_password">Confirmer le mot de passe </label>
                <input type="password" name ="conf_password" class= "inputtext" placeholder="Mot de passe" required>

                </div>

                <input type = "hidden" name="autoGroupe" value="<?php if(isset($_GET['autoGroupe'])) {echo $_GET['autoGroupe'];} ?>">
                <input type="submit" id='submit' class="bouttonarrondi" value='valider' >
              </div>
          </form>
      </div>
    </div>
  </body>

</html>

