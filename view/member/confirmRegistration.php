<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 17/04/14
 * Time: 01:37
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
if(isset($_GET['email']) && isset($_GET['token']))
{
    $projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';

    require $projectRoot.'/required.php';

    $userPdoManager = new UserPdoManager();

    $result = $userPdoManager->validateRegistration($_GET['email'], $_GET['token']);

    if(is_array($result) && isset($result['error']))
        $_SESSION['errorMessage'] = $result['error'];
    else $_SESSION['validMessage'] = $result;
}
//appel de la barre menu
include $projectRoot.'/header/menu.php';
?>

<div id="confirmRegistration">
    <?php
    if(isset($_SESSION['errorMessage'])): ?>
        <div class="alert alert-danger">
            <p>Message from the server :</p>
            <br />
            <?php echo  $_SESSION['errorMessage']; ?>
            <br />
            <br />
            <p>Please contact the technical support at <a>technical.support@cubbyhole.com</a> or retry</p>
            <?php unset($_SESSION['errorMessage']); ?>
        </div>
    <?php endif ?>
    <?php if(isset($_SESSION['validMessage'])): ?>
        <div class="alert alert-success">
            <p>Message from the server :</p>
            <br />
            <?php echo $_SESSION['validMessage']; ?>
            <?php unset($_SESSION['validMessage']); ?>
        </div>
    <?php endif ?>
    <div class="container">
        <div class="row" style="height: 500px;width: 100%;">


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