<?php
session_start();

$loginOK = false;

//appel la bdd
include '../config/db.class.php';

//On verifie si add_user est définie et que les deux champs password sont identique
//S'il sont vrai, on pourra poster les differents éléments du formulaire
if( isset($_POST['add_user'] ) )
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    //Verifie si le champ correspondant a "nom" n'est pas vide, meme chose pour "password"
    //S'il ne sont pas vide=> debut de la condition
    if(!empty($nom) && $password == $password2)
    {
    
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


        //insère le tableau users en bdd
        $user_id = $users_collection->insert($users,array('safe'=>TRUE));

        $loginOK = true;

        //redirection vers le dashboard
        header('Location:../index.php');
    }
    else
    {
        echo "Your password is not equal";
    }
}

if ($loginOK) 
{

  $_SESSION['mail'] = $mail;
 // var_dump($_SESSION['mail']);
  $_SESSION['password'] = $password;
 
}
else {
  echo 'Une erreur est survenue, veuillez reessayer !'; 
}

?>