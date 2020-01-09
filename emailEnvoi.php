<?php

/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './vendor/autoload.php';
*/

class emailEnvoi {

	public function envoyer_email($adresseMail, $titre, $texte)
	{
/*
		//voici comment utiliser PHP mailer en SMTP
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 4; // 0 = no output, 1 = errors and messages, 2 = messages only.
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "posteo.de";
		$mail->Port = 465;
		$mail->Username = "dev.lucy.kueny@posteo.net";  // Adresse emprunté
		$mail->Password = "NotSafe12";      // Mdp
		$mail->CharSet = 'windows-1250';
		$mail->SetFrom ('democratie@participative.com', 'Projet démocratie pariticipative');
		$mail->ContentType = 'text/html';
		$mail->IsHTML(true);

		$mail->Subject = $titre;
		$mail->Body = $texte; 
		$mail->AddAddress ($adresseMail);     

		if(!$mail->Send())
		{
			return false;
		}

		return true;
*/
		echo "<h1>Suite à un malfonction de PHPMailer sous WAMP, ce mail ne peut être envoyé :</h1>";

		echo "TO : $adresseMail <br/>";
		echo "TITRE : $titre <br/>";
		echo "CONTENU : $texte <br/>";
	}
}

?>