<?php
include'../header/header.php';
?>
<!-- Styles -->
<link rel="stylesheet" href="../content/css/bootstrap/bootstrap.min.css"  />
<link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
<link rel="stylesheet" href="../content/css/compiled/theme.css" type="text/css" />
<link rel="stylesheet" href="../content/css/style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../content/css/compiled/reset.css" type="text/css" media="screen" />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>


<?php
//appel de la barre menu
include_once '../header/menu.php';

?>

<body>
<div id="reset_pwd" class="reset_page">
    <?php if(isset($_SESSION['errorMessageReset'])): ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <?php echo  $_SESSION['errorMessageReset']; ?>
            <br />
            <br />
            <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
            <?php unset($_SESSION['errorMessageReset']); ?>
        </div>
    <?php endif ?>

    <?php if(isset($_SESSION['validMessageReset'])): ?>
        <div class="alert alert-success">
            <p>Message from the server :</p>
            <br />
            <p>A confirmation email has been sent to your mailbox</p>
            <?php unset($_SESSION['validMessageReset']); ?>
        </div>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 box_wrapper">
                <div class="col-md-12">
                    <div class="box">
                        <div class="head">
                            <h4>Enter your email address below to receive instructions on how to reset your password.</h4>
                            <div class="line"></div>
                        </div>
                        <div class="form">
                            <form method="POST" action="/Cubbyhole/controller/reset.php">
                                <input type="text" name="resetEmail" placeholder="Email address" class="control-form" />
                                <input type="submit" name="resetPassword" value="SEND"/>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include '../footer/register.footer.php';
?>

</body>
</html>