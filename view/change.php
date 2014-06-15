<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 08/05/14
 * Time: 12:48
 */
include '../header/header.php';
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
include '../header/menu.php';
?>

<!-- Sign In Option 1 -->
<div id="sign_up1">
    <?php if(isset($_SESSION['errorMessageChange'])): ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <?php echo  $_SESSION['errorMessageChange']; ?>
            <br />
            <br />
            <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
            <?php unset($_SESSION['errorMessageChange']); ?>
        </div>
    <?php endif ?>

    <?php if(isset($_SESSION['validMessageChange'])): ?>
        <div class="alert alert-success">
            <p>Message from the server :</p>
            <br />
            <p>Your password has been change</p>
            <?php unset($_SESSION['validMessageChange']); ?>
        </div>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 header">
                <h4>Change your password ?</h4>
            </div>

            <div class="col-sm-3 division">
                <div class="line l"></div>
                <span>here</span>
                <div class="line r"></div>
            </div>

            <div class="footer">
                <form method="post" action="../controller/change.php" class="form">
                    <div class="form-group">
                        <input id="password" name="oldPassword" type="password" placeholder="Actual password" class="form-control center password" >
                    </div>

                    <div class="form-group">
                        <input id="newPassword" name="newPassword" type="password" placeholder="New password" class="form-control center password" >
                    </div>

                    <div class="form-group">
                        <input id="newPasswordConfirmation" name="newPasswordConfirmation" type="password" placeholder="Confirm new password" class="form-control center password">
                    </div>

                    <?php if(isset($_SESSION['user'])): ?>
                    <input id="email" name="email" type="hidden" class="form-control center password" value="<?= $user->getEmail(); ?>">
                    <?php endif ?>
                    <hr>
                    <table class="table-captcha">
                        <tr>
                            <td><?php dsp_crypt(0,1); ?></td>
                        </tr>
                        <tr>
                            <td><input id="captcha" class="input-captcha form-control" type="text" name="code" placeholder="Copy the captcha"></td>
                        </tr>
                        <tr>
                            <td><input id="submit-change" class="input-captcha" type="submit" name="changePassword" value="SEND"></td>
                        </tr>
                    </table>

<!--                    <input id="submit" name="changePassword" value="SEND" type="submit">-->
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include '../footer/register.footer.php';
?>
<script>
//    $(function ()
//    {
//
//        $("#submit-change").click(function()
//        {
//
//            var password = $("#password").val();
//            var newPassword = $("#newPassword").val();
//            var newPasswordConfirmation = $("#newPasswordConfirmation").val();
//            var email = $("#email").val();
//            if (typeof email != undefined){
//                 email = $("#email").val();
//            }
//            else
//            {
//                email = null;
//            }
//
//            setTimeout(function(){
//                alert("Hello")
//            },3000);
//
//
//
//        });
//    });
</script>

</body>
</html>