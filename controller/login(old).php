<?php
//appel la session
session_start();

//variable de session a false
$loginOK = false;


include '../config/db.class.php';
include '../controller/functions.php';

//On check si loginForm est bien defini
//S'il est defini alors on entre dans la condition
if(isset($_POST['loginForm'] ))
{
	$mail = $_POST['mail'];
    $password = $_POST['password'];

    
    //Avant de se logger on verifie bien que les champs mail et password ne sont pas vide
    if(!empty($mail) && !empty($password))
    {
		//Instantiation de la bdd (connexion)
	    $mongo =  DB::instantiate();

	    //récupère la collection "users"
	    $users_collection = $mongo->get_collection('USER');
	    
	    //Notre tableau de requete: interroge la bdd en recherchant le mail et password
		$qry = array( "mail" => $mail, 
					  "password" => md5($password) );

		//execution de la requete grace au curseur "findOne" qui permet de retourner un seul élément d'un collection 
		$result = $users_collection->findOne($qry);

		if($result)
		{
			$loginOK = true;

			get_gravatar($mail);
			var_dump(get_gravatar($mail));
			//redirection vers index
			header('Location:../index.php');
			//var_dump($result);
		}

	}
	
}

if ($loginOK) 
{
	//Pour les sessions
	$_SESSION['mail'] = $mail;
	$_SESSION['password'] = $password;
	var_dump($_SESSION);
}
else 
{
  echo 'Une erreur est survenue, veuillez reessayer !'; 
}

