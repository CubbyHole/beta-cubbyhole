<?php
session_start();
require 'functions.php';
require 'required.php';
$loginOK = false;

//On verifie si add_user est définie et que les deux champs password sont identique
//S'il sont vrai, on pourra poster les differents éléments du formulaire
if( isset($_POST['add_user'] ) )
{
    $name = $_POST['name'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];
    if(!(empty($_POST['geolocation'])))
        $geolocation = $_POST['geolocation'];
    else $geolocation = 'Not specified';

    //Verifie si le champ correspondant a "nom" n'est pas vide, meme chose pour "password"

    //S'il ne sont pas vide=> debut de la condition
    if(!empty($name) && $password == $passwordConfirmation)
    {
		$userPdoManager = new UserPdoManager();
		$result = $userPdoManager->register($name, $firstName, $email, $password, $passwordConfirmation, $geolocation);

		if(!(array_key_exists('error', $result)))
		{
			$loginOK = true;
            
			//redirection vers le dashboar
			header('Location:../index.php');
		}
        else
        {
            echo $result['error'];
        }
    }
    else
    {
        echo "Passwords do not match.";
    }
}

/*if ($loginOK == true) 
{
	//Pour les sessions
	$_SESSION['user'] = serialize($result);
    
}
else 
{
  echo 'Une erreur est survenue, veuillez reessayer !'; 
}
*/
?>