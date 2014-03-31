<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 20/03/14
 * Time: 12:12
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require_once $projectRoot.'/required.php';
//include 'lib/constant.php';
//$projectRoot = $_SERVER['HTTP_HOST'].'/Cubbyhole';
//var_dump($projectRoot);
//require_once $projectRoot.'/controller/functions.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>ubbyhole</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/Cubbyhole/content/img/icons/icons.png">