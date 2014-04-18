<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 17/04/14
 * Time: 16:07
 */
if(isset($_GET['email']) && isset($_GET['token']))
{
    $projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

    require $projectRoot.'/required.php';

    $userPdoManager = new UserPdoManager();

    //champs password et confirmation

    $password = 'Azertyuiop@1234';
    $passwordConfirmation = 'Azertyuiop@1234';

    $result = $userPdoManager->validatePasswordReset($_GET['email'], $_GET['token'], $password, $passwordConfirmation);

    if(is_array($result) && isset($result['error']))
        echo $result['error'];
    else echo $result;
}