<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 17/04/14
 * Time: 16:07
 */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
include $projectRoot.'/header/header.php';
?>

<link rel="stylesheet" href="../../content/css/bootstrap/bootstrap.min.css"  />
<link rel="stylesheet" href="../../content/css/compiled/bootstrap-overrides.css" type="text/css" />
<link rel="stylesheet" href="../../content/css/compiled/theme.css" type="text/css" />
<link rel="stylesheet" href="../../content/css/style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../../content/css/compiled/sign-up.css" type="text/css" media="screen" />
</head>
<?php
if (isset($_POST['resetPass']))
{
    if(isset($_GET['email']) && isset($_GET['token']))
    {
        $projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

        require $projectRoot.'/required.php';

        $userPdoManager = new UserPdoManager();

        //champs password et confirmation
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['passwordConfirmation'];

        $result = $userPdoManager->validatePasswordReset($_GET['email'], $_GET['token'], $password, $passwordConfirmation);

        if(is_array($result) && isset($result['error']))
            $_SESSION['errorMessageReset'] = $result['error'];
        else  $_SESSION['validMessageReset'] = $result;
    }
}

//appel de la barre menu
include $projectRoot.'/header/menu.php';
?>

<div id="sign_up1">

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
            <?php echo  $_SESSION['validMessageReset']; ?>
            <?php unset($_SESSION['validMessageReset']); ?>
        </div>
    <?php endif ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 header">
                <h4>Reset your password</h4>
            </div>

            <div class="col-sm-3 division">
                <div class="line l"></div>
                <span>here</span>
                <div class="line r"></div>
            </div>

            <div class="footer">
                <form method="post" class="form">
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

                    <input id="submit" name="resetPass" value="RESET" type="submit">
                </form>
            </div>

            <div class="col-md-12 dosnt">
                <input id="pass" value="Pass" type="submit">
            </div>

        </div>
    </div>
</div>
<footer id="footer">
    <div class="container">
        <div class="row info">
            <div class="col-sm-6 residence">
                <ul>
                    <li>16 Cours de l'Évêque Moreau</li>
                    <li>71000 Mâcon, France</li>
                </ul>
            </div>
            <div class="col-sm-5 touch">
                <ul>
                    <li><strong>SUPINFO</strong> +33 1 53 35 97 00</li>
                    <li><strong>A.</strong><a href="#">125637@supinfo.com</a></li>
                </ul>
            </div>
        </div>
        <div class="row credits">
            <div class="col-md-12">
                <div class="row social">
                    <div class="span12">
                        <a href="#" class="facebook">
                            <span class="socialicons ico1"></span>
                            <span class="socialicons_h ico1h"></span>
                        </a>
                        <a href="#" class="twitter">
                            <span class="socialicons ico2"></span>
                            <span class="socialicons_h ico2h"></span>
                        </a>
                        <a href="#" class="gplus">
                            <span class="socialicons ico3"></span>
                            <span class="socialicons_h ico3h"></span>
                        </a>
                        <a href="#" class="flickr">
                            <span class="socialicons ico4"></span>
                            <span class="socialicons_h ico4h"></span>
                        </a>
                        <a href="#" class="pinterest">
                            <span class="socialicons ico5"></span>
                            <span class="socialicons_h ico5h"></span>
                        </a>
                        <a href="#" class="dribble">
                            <span class="socialicons ico6"></span>
                            <span class="socialicons_h ico6h"></span>
                        </a>
                        <a href="#" class="behance">
                            <span class="socialicons ico7"></span>
                            <span class="socialicons_h ico7h"></span>
                        </a>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-md-12">
                        © 2014 Cubbyhole. SUPINFO International.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/Cubbyhole/content/js/bootstrap.min.js"></script>
<script src="/Cubbyhole/content/js/theme.js"></script>
<script src="/Cubbyhole/content/js/index-slider.js"></script>
<script src="/Cubbyhole/content/js/flexslider.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="/Cubbyhole/content/js/jquery.complexify.js"></script>
<script src="/Cubbyhole/content/js/passwordComplexity/complexity.js"></script>
<script src="/Cubbyhole/content/js/geo/geo.js"></script>
<script>
    $(function () {

        $( "#pass" ).click(function() {

            $('#password').val('Azertyuiop@123');
            $('#passwordConfirmation').val('Azertyuiop@123');
        });
    });
</script>

