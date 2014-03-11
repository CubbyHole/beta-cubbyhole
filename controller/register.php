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
		
		/*
        //Instantiation de la bdd (connexion)
        $mongo =  DB::instantiate();

        //récupère la collection "users" et "account"
        //s'il n'existe pas alors mongo va la crée
        $users_collection = $mongo->get_collection('USER');
        $account_collection = $mongo->get_collection('ACCOUNT');

        //tableau des différents champ à entrer en bdd pour "USER"
        $users = array(
                    '_id' => hash('sha1', time() . $nom),
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'mail' => $mail,
                    'password' => md5($password),
                    'password2' => md5($password2),
                    'created_on' => new MongoDate()
                );

        //tableau des differents élément a rentren en bdd pour "ACCOUNT"
        $account = array(
                    '_id' => hash('sha1', time() . $nom),
                    'etat' => '',
                    'idRefPlan' => '',
                    'idUser' => hash('sha1', time() . $nom),
                    'storage' => '',
                    'ratio' => '',
                    'dateDebut' => new MongoDate(),
                    'dateFin' => new MongoDate()
                );

        //insère le tableau users en bdd
        $user_id = $users_collection->insert($users);

        //insère le tableau account en bdd
        $account_id = $account_collection->insert($account);
		*/

		if(!(array_key_exists('error', $result)))
		{
			$loginOK = true;
            
			//redirection vers le dashboar
			header('Location:../index.php');
		}
        else {
            echo $result['error'];
        }
    }
    else
    {
        echo "Your password is not equal";
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