<?php
include'../header/header.php';
//$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
//var_dump($_SERVER['DOCUMENT_ROOT']);

//require_once $projectRoot . '/controller/functions.php';
//require_once $projectRoot . '/controller/register.php';

?>
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


<?php
//appel de la barre menu
include_once '../header/menu.php';

?>
<!-- Sign In Option 1 -->
<?php if(isset($_SESSION['errorMessage'])): ?>
<div class="alert alert-danger">
    <?php echo "<p>Message from the server :</p> <br />";
          echo  $_SESSION['errorMessage'];
          echo "<br />";
    echo "<br />";
          echo "<p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>";
    unset($_SESSION['errorMsg']);
    ?>
</div>
<?php endif ?>

<div id="sign_up1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 header">
                <h4>Create your account</h4>
            </div>

            <div class="col-sm-3 division">
                <div class="line l"></div>
                <span>here</span>
                <div class="line r"></div>
            </div>

            <div class="footer">
                <form method="post" action="../controller/register.php" class="form">
                    <div class="form-group">
                        <input id="name" name="name" type="text" placeholder="Nom" class="form-control center" autofocus >
                    </div>

                    <div class="form-group">
                        <input id="firstname" name="firstName" type="text" placeholder="Prenom" class="form-control center">
                    </div>

                    <div class="form-group">
                        <input id="email" name="email" type="text" placeholder="Email" class="form-control center">
                    </div>

                    <div class="form-group">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control center password" >
                    </div>

                    <div class="form-group">
                        <input id="passwordConfirmation" name="passwordConfirmation" type="password" placeholder="Confirm Password" class="form-control center password">
                    </div>

                    <!--Complexité du mot de passe -->
                    <div class="form-group">
                        <div id="progressbar" >
                            <div id="progress" class="progressbarInvalid" style="width: 0%;">
                                <div id="complexity" class="noticeInvalid"></div>
                            </div>
                        </div>
                        <p id="notice" class="noticeInvalid">Strenght password</p>
                    </div>

                    <input id="geolocation" name="geolocation" type="hidden">

                    <input id="submit" name="add_user" value="Sign up" type="submit">
                </form>
            </div>

            <!--<div class="col-md-5 remember">
                <label class="checkbox">
                    <input type="checkbox"> Remember me
                </label>
                <a href="#">Forgot password?</a>
            </div>-->

            <div class="col-md-12 dosnt">
                <span>Already have an account?</span>
                <a href="login.php">Sign in</a>
            </div>

            <div class="col-md-12 dosnt">

                <input id="pass" value="Pass" type="submit">
            </div>

        </div>
    </div>
</div>

<?php
include '../footer/register.footer.php';
?>
<script>
    $(function () {

        $( "#pass" ).click(function() {

            $('#password').val('Azertyuiop@123');
            $('#passwordConfirmation').val('Azertyuiop@123');
        });
    });
</script>

</body>
</html>