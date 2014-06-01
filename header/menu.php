<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 20/03/14
 * Time: 12:27
 */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/Cubbyhole';
require_once $projectRoot.'/required.php';
$userManager = new UserPdoManager();
$accountManager = new AccountPdoManager();
$refManager = new RefPlanPdoManager();

if(isset($_SESSION['user']))
{
    /*$userInSession = unserialize($_SESSION['user']);
    $user = $userManager->findById($userInSession->getId());
    $userAccount = $accountManager->findById($user->getCurrentAccount());
    $userPlan = $refManager->findById($userAccount->getRefPlan());*/
}
?>
<body class="pull_top">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/Cubbyhole"><img id="cubbyLogo" src="/Cubbyhole/content/img/icons/cubbyhole_logoFull.png"><strong>UBBYHOLE</strong></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">

            <ul id="menuOne"class="nav navbar-nav navbar-left">
                <li><a href="/Cubbyhole">HOME</a></li>
                <li><a href="/Cubbyhole/view/pricing.php">PRICING</a></li>

                <?php if (isset($_SESSION['user'])) : $user = unserialize($_SESSION['user']);//recupère la session du login?>
                    <li><a href="/Cubbyhole/view/account.php">MY ACCOUNT</a></li>
                <?php else: ?>

                    <li><a href="/Cubbyhole/view/register.php">REGISTER</a></li>
                    <li><a href="/Cubbyhole/view/login.php">LOGIN</a></li>

                <?php endif ?>
                <li><a href="/Cubbyhole/view/about-us.php">ABOUT US</a></li>
                <li><a href="/Cubbyhole/view/contact.php">CONTACT US</a></li>

            </ul>

            <ul id="menuTwo" class="nav navbar-nav navbar-right ">
                <?php if (isset($_SESSION['user'])): //Mise en place d'un module Gravatar pour la photo de profil ?>
                    <li>

                        <img class="img-circle" title="<?php echo $user->getLastName().' '.$user->getFirstname(); ?>" src=<?php echo getGravatar($user->getEmail()); ?>>

                    </li>
                    <li>
                        <a id="cross" title="Se déconnecter" href="/Cubbyhole/view/logout.php"><span style="color:red;" class="glyphicon glyphicon-remove"></span></a></span>
                    </li>
                    <li>
                        <a id="menuTwo-Name">
                            <?php echo $user->getLastName().' '.$user->getFirstname(); ?>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

</nav>