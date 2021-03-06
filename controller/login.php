<?php
//appel la session
session_start();

//variable de session a false
$loginOK = false;

$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require $projectRoot.'/controller/functions.php';
require $projectRoot.'/required.php';
$cryptinstall = $projectRoot.'/controller/crypt/cryptographp.fct.php';
include $cryptinstall;

//On check si loginForm est bien defini
//S'il est defini alors on entre dans la condition
if(isset($_POST['loginForm'] ))
{


    if(chk_crypt($_POST['code']))
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
                $loginOK = TRUE;
                $_SESSION['user'] = serialize($user);
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
    else
    {
        $errorCaptcha = 'Error, invalid captcha';

        $_SESSION['errorMessageCaptcha'] = $errorCaptcha;
        header('Location:../view/login.php');
        die();
    }

}


