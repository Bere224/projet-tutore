
<?php 
    $titrePage="Rejoignez nous !";

?>

<head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css2.css" media="screen" type="text/css" />
    </head>


     <div id="container">
        <form method = "post" action="newutilisateur.php">
              <h1>Vos info</h1>
                <div class= "formulaire_reservation_label-input">
                  <label for="nom"><b>Nom : </b></label>
                  <input type = "text" name="nom" class="formulaire_reservation_name" autocomplete = "on" autofocus required><br><br>

                  <label for="prenom"><b>Prénom :</b> </label>
                  <input type = "text" name="prenom" class="formulaire_reservation_prenom" autocomplete = "on" required><br><br>

                  <label for="email"><b>Email : </b></label>
                  <input type = "email" name="email" class="formulaire_reservation_email" autocomplete = "on" required> <br><br>

				  <label for="nom"><b>Login </b></label>
                  <input type = "text" name="login" class="formulaire_reservation_name" autocomplete = "on" autofocus required><br><br>

                  <label for="password"><b>Choisissez un mot de passe : </b></label>
                  <input type="password" name ="password" class= "formulaire_reservation_psw" required><br><br>

                  <label for="conf_password"><b>Confirmer le mot de passe : </b></label>
                  <input type="password" name ="conf_password" class= "formulaire_reservation_confirmation_psw" required><br><br>


                  <input type="submit" id='submit' value='INSCRIPTION' >
               
             
        </form>
      </section>




