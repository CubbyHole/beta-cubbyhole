<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 01/05/14
 * Time: 23:08
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require_once $projectRoot.'/controller/functions.php';
require_once $projectRoot.'/required.php';
$loginOK = false;

if(isset($_POST['resetPassword']))
{
    $email = $_POST['resetEmail'];

    if(!empty($email))
    {
        $userPdoManager = new UserPdoManager();
        $result = $userPdoManager->sendResetPasswordRequest($email);

        //http://www.php.net/manual/en/function.array-key-exists.php
        if( !( array_key_exists('error', $result) ) )
        {
            $loginOK = true;
            $_SESSION['validMessageReset'] = $loginOK;
            //reste sur la page
            header('Location:/Cubbyhole/view/reset.php');
            die();
        }
        else
        {

            $_SESSION['errorMessageReset'] = $result['error'];
            header('Location:/Cubbyhole/view/reset.php');
            die();
        }
    }
    else
    {
        echo "Email not valid or empty";
    }
}