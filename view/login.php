<?php
include_once '../header/header.php';
//$projectRoot = $_SERVER['HTTP_HOST'].'/Cubbyhole';
//$cryptinstall = 'http://'.$projectRoot.'/content/captcha/crypt/cryptographp.fct.php';
$cryptinstall = "../controller/crypt/cryptographp.fct.php";
include $cryptinstall;
//require $projectRoot.'/controller/functions.php';

?>
    <!-- Styles -->
    <link rel="stylesheet" href="../content/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/compiled/theme.css" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../content/css/compiled/sign-in.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../content/css/lib/animate.css" type="text/css" media="screen, projection" />

    <link rel="stylesheet" href="../content/css/style.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
<?php
 include '../header/menu.php';

?>

    <!-- Sign In Option 1 -->
    <div id="sign_in1" class="sign_in1">

        <?php if(isset($_SESSION['errorMessageLogin'])): ?>
            <div class="alert alert-danger">
                <p>Message from the server :</p>
                <br />
                <?php echo  $_SESSION['errorMessageLogin']; ?>
                <br />
                <br />
                <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
                <?php unset($_SESSION['errorMessageLogin']); ?>
            </div>
        <?php elseif(isset($_SESSION['errorMessageCaptcha'])): ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <?php echo  $_SESSION['errorMessageCaptcha']; ?>
            <br />
            <?php unset($_SESSION['errorMessageCaptcha']); ?>
        </div>
        <?php endif ?>

        <?php if(empty($_SESSION['user'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 header">
                    <h4>Authentification</h4>
                    
                    <div class="col-md-4 social">
                        <a href="#" class="circle facebook">
                            <img src="../content/img/face.png" alt="">
                        </a>
                         <a href="#" class="circle twitter">
                            <img src="../content/img/twt.png" alt="">
                        </a>
                         <a href="#" class="circle gplus">
                            <img src="../content/img/gplus.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3 division">
                    <div class="line l"></div>
                    <span>here</span>
                    <div class="line r"></div>
                </div>

                <div class="col-md-12 footer">
                   <form method="post" action="../controller/login.php" class="form-inline ">
                       <input id="email" name="email" type="text"  autofocus placeholder="Email" class="form-control" required>
                        <input id="password" name="password" type="password"  placeholder="Password" class="form-control" required>
                       <table class="table-captcha">
                           <tr>
                               <td><?php dsp_crypt(0,1); ?></td>
                           </tr>
                           <tr>
                               <td><input class="input-captcha form-control" type="text" name="code" placeholder="Copy the captcha"></td>
                           </tr>
                           <tr>
                               <td><input class="input-captcha" type="submit" name="loginForm" value="login"></td>
                           </tr>
                       </table>
                   </form>
               </div>

                <div class="col-md-12 dosnt">
                    <input id="ident" value="Id" type="submit">
                    <input id="pass" value="Pass" type="submit">
                    <input id="newPass" value="newPass" type="submit">
                </div>

                <div class="col-md-12 proof">
                    <div class="col-md-6 remember">

                        <a href="reset.php">Forgot password?</a>
                    </div>

                    <div class="col-md-6">
                        <div class="dosnt">
                            <span>Don’t have an account?</span>
                            <a href="register.php">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <strong>You are already identified</strong>
            <br />
            <br />
            <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
        </div>
        <?php endif; ?>
    </div>
    <?php include '../footer/footer.php'; ?>
<script>
    $(function () {
        $( "#ident" ).click(function() {

            $('#email').val('knt92@hotmail.fr');
            $('#password').val('Azertyuiop@123');

        });

        $( "#pass" ).click(function() {

            $('#password').val('Azertyuiop@123');

        });

        $( "#newPass" ).click(function() {
            $('#password').val('Wxcvbnjklm@123');

        });
    });
</script>