<?php
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require_once $projectRoot.'/controller/functions.php';
require_once $projectRoot.'/required.php';
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
        /*$result = $userPdoManager->register($name, $firstName, $email, $password, $passwordConfirmation, $geolocation);*/
        $result = $userPdoManager->register(_sanitize($name), _sanitize($firstName), _sanitize($email), _sanitize($password), _sanitize($passwordConfirmation), _sanitize($geolocation));


        //http://www.php.net/manual/en/function.array-key-exists.php
		if( !( array_key_exists('error', $result) ) )
		{
			$loginOK = true;
            $_SESSION['validMessageRegister'] = $loginOK;

			//reste sur la page
			header('Location:/Cubbyhole/view/register.php');
		}
        else
        {

            $_SESSION['errorMessageRegister'] = $result['error'];
            header('Location:../view/register.php');
            die();
        }
    }
    else
    {
        echo "Passwords do not match.";
    }
}

?>