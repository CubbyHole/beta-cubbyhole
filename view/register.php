<?php
include'../header/header.php';
$cryptinstall = "../controller/crypt/cryptographp.fct.php";
include $cryptinstall;
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
<div id="sign_up1">
    <?php if(isset($_SESSION['errorMessageRegister'])): ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <?php echo  $_SESSION['errorMessageRegister']; ?>
            <br />
            <br />
            <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
            <?php unset($_SESSION['errorMessageRegister']); ?>
        </div>
    <?php elseif(isset($_SESSION['validMessageRegister'])): ?>
        <div class="alert alert-success">
            <p>Message from the server :</p>
            <br />
            <p>A confirmation email has been sent to your mailbox</p>
            <?php unset($_SESSION['validMessageRegister']); ?>
        </div>
    <?php elseif(isset($_SESSION['errorMessageCaptcha'])): ?>
    <div class="alert alert-danger">
        <p>Message from the server :</p>
        <br />
        <?php echo  $_SESSION['errorMessageCaptcha']; ?>
        <?php unset($_SESSION['errorMessageCaptcha']); ?>
    </div>
    <?php endif ?>



    <?php if(empty($_SESSION['user'])): ?>
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
                        <input id="name" name="name" type="text" placeholder="Lastname" class="form-control center" autofocus >
                    </div>

                    <div class="form-group">
                        <input id="firstname" name="firstName" type="text" placeholder="Firstname" class="form-control center">
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
                        <div id="progressbarRegister" class="center" >
                            <div id="progressRegister" class="progressbarInvalid" style="width: 0%;">
                                <div id="complexity"></div>
                            </div>
                        </div>
                        <p id="notice" class="noticeInvalid">Strenght password</p>
                    </div>

                    <input id="geolocation" name="geolocation" type="hidden">

                    <table class="table-captcha">
                        <tr>
                            <td><?php dsp_crypt(0,1); ?></td>
                        </tr>
                        <tr>
                            <td><input id="captcha" class="input-captcha form-control" type="text" name="code" placeholder="Copy the captcha"></td>
                        </tr>
                        <tr>
                            <td><input id="submit" class="input-captcha" type="submit" name="add_user" value="Sign up"></td>
                        </tr>
                    </table>

<!--                    <input id="submit" name="add_user" value="Sign up" type="submit">-->

                </form>
            </div>

            <div class="col-md-12 dosnt">
                <span>Already have an account?</span>
                <a href="login.php">Sign in</a>
            </div>

        </div>
    </div>

    <?php else: ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <strong>You already have an account</strong>
            <br />
            <br />
            <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
        </div>
    <?php endif; ?>

</div>

<?php
include '../footer/register.footer.php';
?>