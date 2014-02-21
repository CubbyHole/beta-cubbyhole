<?php
// On appelle la session
session_start();

// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();

//redirection vers le dashboard
header('Location: ../index.php');