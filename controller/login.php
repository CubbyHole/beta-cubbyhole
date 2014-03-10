<?php
//appel la session
session_start();

//variable de session a false
$loginOK = false;

include 'functions.php';
require 'required.php';

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
		
		if(!(array_key_exists('error', $user)))
		{
			$loginOK = true;
			$grav = get_gravatar($user->getEmail());
			//var_dump($test);
			//redirection vers index
			header('Location:../index.php');
		}

	}
	
}

if ($loginOK) 
{
	//Pour les sessions
	$_SESSION['user'] = serialize($user);
	$_SESSION['email'] = $grav;
 }
else 
{
  echo $user['error'];
}

