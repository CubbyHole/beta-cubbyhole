<?php
//appel la session
session_start();

//variable de session a false
$loginOK = false;

$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require $projectRoot.'/controller/functions.php';
require $projectRoot.'/required.php';

//On check si loginForm est bien defini
//S'il est defini alors on entre dans la condition
if(isset($_POST['loginForm'] ))
{
	$email = $_POST['email'];
    $password = $_POST['password'];

    
    //Avant de se logger on verifie bien que les champs mail et password ne sont pas vide
    if(!empty($email) && !empty($password))
    {
		$userPdoManager = new UserPdoManager();
		$user = $userPdoManager->authenticate($email, $password);

        //http://www.php.net/manual/en/function.array-key-exists.php
		if(!(array_key_exists('error', $user)))
		{
			$loginOK = true;
			//redirection vers index
			header('Location:../index.php');
		}
        else
        {

            $_SESSION['errorMessageLogin'] = $user['error'];
            header('Location:../view/login.php');
            die();
        }

	}
	
}

if($loginOK)
{
	//Pour les sessions
	$_SESSION['user'] = serialize($user);
}
else 
{
  echo $user['error'];
}

