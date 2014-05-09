<?php
include'../header/header.php';
?>
    <!-- Styles -->
    <link rel="stylesheet" href="../content/css/bootstrap/bootstrap.min.css"  />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/compiled/theme.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/style.css" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../content/css/compiled/sign-up.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
<?php
include '../header/menu.php';
?>
<div id="sign_up1">

    <div class="container">
        <?php

        if (isset($_SESSION['user']))
        {
            echo 'Bienvenue :' . $user->getLastName().' '.$user->getFirstname();
        }
        ?>

    </div>
            

<?php include '../footer/footer.php'; ?>