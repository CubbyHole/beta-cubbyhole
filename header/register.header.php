<?php require '../model/pdo/UserPdoManager.class.php';
require_once '../controller/functions.php';

if( isset($_POST['add_user'] ) )
{
    $name = $_POST['name'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];
    
    //Verifie si le champ correspondant a "nom" n'est pas vide, meme chose pour "password"
    //S'il ne sont pas vide=> debut de la condition
    if(!empty($name) && $password == $passwordConfirmation)
    {
    
        $user = new UserPdoManager();
        $user->register($name, $firstName, $email, $password, $passwordConfirmation);

        header('Location:../index.php');
    }
    else
    {
        echo "Your password is not equal";
    }
}


 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cubbyhole - Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Styles -->
    <link rel="stylesheet" href="../content/css/bootstrap/bootstrap.min.css"  />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/compiled/theme.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/style.css" type="text/css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    
    <link rel="stylesheet" href="../content/css/compiled/sign-up.css" type="text/css" media="screen" />
    
    <link rel="stylesheet" type="text/css" href="../content/css/lib/animate.css" media="screen, projection" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../index.php" class="navbar-brand"><strong>CUBBYHOLE</strong></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="about-us.php">ABOUT US</a></li>
                    <li><a href="pricing.php">PRICING</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                    <li class="active"><a href="register.php">REGISTER</a></li>
                    <li><a href="login.php">LOGIN</a></li>

                </ul>
            </div>
        </div>
    </div>