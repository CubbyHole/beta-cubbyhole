<?php 
session_start(); 
include_once '../controller/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Business Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Styles -->
    <link href="../content/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../content/css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../content/css/compiled/contact.css" type="text/css" media="screen" />
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
                    <li class="active"><a href="contact.php">CONTACT US</a></li>
                    <?php 
                    //recupère la session du login
                    if($_SESSION == true)
                    { 
                        echo '<li><a href="account.php ">MY ACCOUNT</a></li>';
                        echo '<li><a href="logout.php">LOGOUT</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="register.php">REGISTER</a></li>';
                        echo '<li><a href="login.php">LOGIN</a></li>';
                    }
                    ?>

                    <?php if($_SESSION == true): //Mise en place d'un module Gravatar pour la photo de profil ?> 
                        <li><img class="img-circle" src=<?php echo $_SESSION['email']; ?> ></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>