<?php

$mail = 'knt92@hotmail.fr'; // Déclaration de l'adresse de destination.

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}
if(isset($_POST['mail']))
{
	//=====Déclaration des messages au format texte et au format HTML.
	$message_nom = $_POST['nom'];
	$message_email = $_POST['email'];
	$message_phone = $_POST['phone'];
	$message_txt = $_POST['mymsg'];

	/*var_dump($message_nom);
	var_dump($message_email);
	var_dump($message_txt);*/

	//$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	//$sujet = "Hey mon ami !";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: $message_email ".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne.$passage_ligne;
	//=====Ajout du message au format texte.
	//$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
	//$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= "Nom :  " . $message_nom.$passage_ligne; 
	$message.= "E-mail :  " . $message_email.$passage_ligne;
	$message.= "Telephone :  " . $message_phone.$passage_ligne;
	$message.= $passage_ligne;
	$message.= "Message :  " . $passage_ligne.$message_txt.$passage_ligne;

	//==========
	 if(!empty($message_nom) && !empty($message_txt) && !empty($message_email))
	 {
	 	ini_set("sendmail_from",$message_email);
		//=====Envoi de l'e-mail.
		mail($mail, $header, $message);
		//==========
	 	var_dump($mail, $header, $message);
		//header('Location:../index.php');
		
	 }
}else{
	echo "erreur";
}