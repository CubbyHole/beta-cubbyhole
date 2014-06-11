<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 09/05/14
 * Time: 15:46
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require_once $projectRoot.'/controller/functions.php';
require_once $projectRoot.'/required.php';
$cryptinstall = $projectRoot.'/controller/crypt/cryptographp.fct.php';
include $cryptinstall;
$OK = false;

if(isset($_POST['changePassword']))
{
    $email = $_POST['email'];
    $oldPass = $_POST['oldPassword'];
    $newPass = $_POST['newPassword'];
    $newPassConfirm = $_POST['newPasswordConfirmation'];

    if(!empty($email))
    {
        if(chk_crypt($_POST['code']))
        {
            $userPdoManager = new UserPdoManager();
            $result = $userPdoManager->changePassword($email, $oldPass, $newPass, $newPassConfirm);

            //http://www.php.net/manual/en/function.array-key-exists.php
            if( !( array_key_exists('error', $result) ) )
            {
                $OK = true;
                $_SESSION['validMessageChange'] = $OK;
                //reste sur la page
                header('Location:/Cubbyhole/view/change.php');
                die();
            }
            else
            {

                $_SESSION['errorMessageChange'] = $result['error'];
                header('Location:/Cubbyhole/view/change.php');
                die();
            }

        }
        else
        {
            $errorCaptcha = 'Error, invalid captcha';
            $_SESSION['errorMessageChange'] = $errorCaptcha;
            header('Location:/Cubbyhole/view/change.php');
            die();
        }


    }
    else
    {
        $_SESSION['errorMessageChange'] = $result['error'];
        header('Location:/Cubbyhole/view/change.php');
        die();
    }
}
