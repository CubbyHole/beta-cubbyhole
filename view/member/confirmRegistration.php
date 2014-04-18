<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 17/04/14
 * Time: 01:37
 */
if(isset($_GET['email']) && isset($_GET['token']))
{
    $projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

    require $projectRoot.'/required.php';

    $userPdoManager = new UserPdoManager();

    $result = $userPdoManager->validateRegistration($_GET['email'], $_GET['token']);

    if(is_array($result) && isset($result['error']))
        echo $result['error'];
    else echo $result;
}