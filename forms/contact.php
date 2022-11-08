<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
    $subject= $_POST['subject'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = $email; 
		
		//Mail où sera envoyé le message
		$to = 'bourgeoiskimbondo@gmail.com'; 
		
		$subject = "Message de  ".$name." ";
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
		// Verification si le nom a été bien entré
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Verifiaction que le mail a bien été entré
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Verification que le message a été entré
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
	/* if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}*/
 
// Si il n'ya pa d'erreur, envoyer le mail
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Merci! Votre message a été envoyé</div>';
	} else {
		$result='<div class="alert alert-danger">Desole, il ya une erreur lors de l''envoie du message. Veuillez reessayer</div>';
	}
}
	}
?>