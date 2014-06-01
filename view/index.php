<?php
$projectRoot = $_SERVER['HTTP_HOST']. '/Cubbyhole';
?>
<!-- Styles -->
<link href="content/css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="content/css/compiled/bootstrap-overrides.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="content/css/compiled/theme.css" />

<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="content/css/compiled/index.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="content/css/lib/animate.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="content/css/style.css" media="screen, projection" />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<?php
    include_once 'header/menu.php';
$refPlanPdoManager = new RefPlanPdoManager();
$freePlans = $refPlanPdoManager->findFreePlans();
$premiumPlans = $refPlanPdoManager->findPremiumPlans();
$ipnUrl = 'https://5b0ead1c.ngrok.com/';

?>

<section id="feature_slider" class="lol">
<!--
Each slide is composed by <img> and .info
- .info's position is customized with css in index.css
- each <img> parallax effect is declared by the following params inside its class:

example: class="asset left-472 sp600 t120 z3"
left-472 means left: -472px from the center
sp600 is speed transition
t120 is top to 120px
z3 is z-index to 3
Note: Maintain this order of params

For the backgrounds, you can combine from the bgs folder :D
-->

<article class="slide" id="showcasing" style="background: url('content/img/backgrounds/deep-green.jpg') repeat-x top center;">
    <img class="asset left250 sp600 t120 z1" src="content/img/slides/scene4/my.png" />
    <div class="info">
        <h2>MongoDB</h2>

        <p style="color:white;">Performance, speed</p>
    </div>
</article>

<!--<article class="slide" id="ideas" style="background: url('content/img/backgrounds/aqua.jpg') repeat-x top center;">
    <div class="info">
        <h2>We love to turn ideas into beautiful things.</h2>
    </div>
    <img class="asset left-480 sp600 t260 z1" src="content/img/slides/scene2/left.png" />
    <img class="asset left-210 sp600 t213 z2" src="content/img/slides/scene2/middle.png" />
    <img class="asset left60 sp600 t260 z1" src="content/img/slides/scene2/right.png" />
</article>-->

<article class="slide" id="tour" style="background: url('content/img/backgrounds/color-splash.jpg') repeat-x top center;">
    <img class="asset left-472 sp650 t210 z3" src="content/img/slides/scene3/ipad.png" />
    <img class="asset left-365 sp600 t270 z4" src="content/img/slides/scene3/iphone5.png" />
    <img class="asset left-350 sp450 t135 z2" src="content/img/slides/scene3/desktop2.png" />
    <div class="info">
        <h2>Fully Responsive Cubbyhole theme</h2>
        <!--<a href="features.php">TOUR THE PRODUCT</a>-->
    </div>
</article>

<article class="slide" id="responsive" style="background: url('content/img/backgrounds/indigo.jpg') repeat-x top center;">
    <img class="asset left-472 sp600 t120 z3" src="content/img/slides/scene4/html5.png" />
    <img class="asset left-190 sp500 t120 z2" src="content/img/slides/scene4/css3.png" />
    <div class="info">
        <h2>
            Responsive <strong>HTML5 & CSS3</strong>
            Theme
        </h2>
    </div>
</article>

</section>


</br>

<div id="showcase">

    <div class="container">

    <?php
    if(isset($_SESSION['user']))
    {
        $info = unserialize($_SESSION['user']);

        //$u = getUserDetails($_SESSION['user']);
        var_dump($info->getCurrentAccount()->getRefPlan()->getName());
        var_dump($info);
    }

    ?>

        <div class="section_header">
            <h3>Our Services</h3>
        </div>
        <div class="row feature_wrapper">
            <!-- Features Row -->
            <div class="features_op1_row">
                <!-- Feature -->
                <div class="col-sm-4 feature first">
                    <div class="img_box">
                        <a href="services.php">
                            <img src="content/img/mongo_logo.png">
                            <span class="circle">
                                <span class="plus">&#43;</span>
                            </span>
                        </a>
                    </div>
                    <div class="text">
                        <h6>Work with MongoDB</h6>
                        <p>
                            Performance
                        </p>
                    </div>
                </div>
                <!-- Feature -->
                <div class="col-sm-4 feature">
                    <div class="img_box">
                        <a href="services.php">
                            <img src="content/img/service2.png">
                            <span class="circle">
                                <span class="plus">&#43;</span>
                            </span>
                        </a>
                    </div>
                    <div class="text">
                        <h6>4 Plans</h6>
                        <p>
                            We have 4 plans
                        </p>
                    </div>
                </div>
                <!-- Feature -->
                <div class="col-sm-4 feature last">
                    <div class="img_box">
                        <a href="services.php">
                            <img src="content/img/DD.png">
                            <span class="circle">
                                <span class="plus">&#43;</span>
                            </span>
                        </a>
                    </div>
                    <div class="text">
                        <h6>Storage</h6>
                        <p>
                            10Go / 500Go / Unlimited
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div id="features">
    <div class="container">
        <div class="section_header">
            <h3>Features</h3>
        </div>
        <div class="row feature">
            <div class="col-sm-6">
                <img src="content/img/showcase1.png" class="img-responsive" />
            </div>
            <div class="col-sm-6 info">
                <h3>
                    <img src="content/img/features-ico1.png" />
                    Beautiful on all devices
                </h3>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                </p>
            </div>
        </div>
        <div class="row feature">
            <div class="col-sm-6 pic-right">
                <img src="content/img/showcase2.png" class="pull-right img-responsive" />
            </div>
            <div class="col-sm-6 info info-left">
                <h3>
                    <img src="content/img/features-ico2.png" />
                    Blog page included
                </h3>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                </p>
            </div>
        </div>
        <div class="row feature">
            <div class="col-sm-6">
                <img src="content/img/showcase3.png" class="img-responsive" />
            </div>
            <div class="col-sm-6 info">
                <h3>
                    <img src="content/img/features-ico3.png" />
                    Simple and clean coming soon page
                </h3>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                </p>
            </div>
        </div>
    </div>
</div>-->


<!-- Pricing Option -->
<div id="in_pricing">
    <div class="container">
        <div class="section_header">
            <h3>Pricing</h3>
        </div>

        <div class="row charts_wrapp">
            <?php foreach($freePlans as $plan): ?>
                <!-- Plan Box FREE -->
                <div class="col-sm-4">

                    <div class="plan">
                        <div class="wrapper">
                            <h3><?= $plan->getName() ?></h3>
                            <div class="price">
                                <span class="dollar">$</span>
                                <span class="qty"><?= $plan->getPrice() ?></span>
                                <span class="month">/month</span>
                            </div>
                            <div class="price">
                                <span class="qty"><?= round(convertKilobytes($plan->getMaxStorage())) ?></span>
                                <span class="month">Mb</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>1</strong>
                                    files / DL
                                </p>
                                <p>
                                    <strong>Download speed</strong><br />
                                    <?= $plan->getDownloadSpeed() ?> Kb/s
                                </p>
                                <p>
                                    <strong>Upload speed</strong><br />
                                    <?= $plan->getUploadSpeed() ?> Kb/s
                                </p>
                                <p>
                                    <strong>30</strong>
                                    days of storage
                                </p>
                                <?php if(!isset($_SESSION['user'])): ?>

                                    <form target="_blank" class="paypal" action="view/register.php" method="post" target="_top">
                                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
            <?php foreach($premiumPlans as $plan):

                /*Condition pour id du bouton paypal */
                switch($plan->getName())
                {
                    case 'Premium':
                        $idPaypal = "BX5Q3MK47TUDQ";
                        break;

                    case 'Ultimate':
                        $idPaypal = "N9X3E9UW4D6RJ";
                        break;
                }

                ?>
                <!-- Plan Box PREMIUM & ULTIMATE -->
                <div class="col-sm-4 pro">
                    <div class="plan">
                        <div class="wrapper">
                            <h3><?= $plan->getName() ?></h3>
                            <?php
                            if($plan->getName() == 'Ultimate')
                            {
                                echo '<img class="ribbon" src="content/img/badge.png">';
                            }
                            ?>
                            <div class="price">
                                <span class="dollar">$</span>
                                <span class="qty"><?= $plan->getPrice() ?></span>
                                <span class="month">/month</span>
                            </div>
                            <div class="price">
                                <span class="qty"><?= round(convertKilobytes($plan->getMaxStorage())) ?></span>
                                <span class="month">Mb</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>Multiple</strong>
                                    files / DL
                                </p>
                                <p>
                                    <strong>Download speed</strong><br />
                                    <?= $plan->getDownloadSpeed() ?> Kb/s
                                </p>
                                <p>
                                    <strong>Upload speed</strong><br />
                                    <?= $plan->getUploadSpeed() ?> Kb/s
                                </p>
                                <p>
                                    <strong>Unlimited</strong>
                                    days of storage
                                </p>
                            </div>
                            <?php if(isset($_SESSION['user'])): //Si user connecté, le redirige sur paypal, sinon sur la page register.php ?>
                                <form target="_blank" class="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="<?= $idPaypal ?>">
                                    <input name="notify_url" type="hidden" value="<?= $ipnUrl; ?>Cubbyhole/controller/ipn.php" />
                                    <input name="return" type="hidden" value="<?= $ipnUrl; ?>Cubbyhole/view/success-pricing.php" />
                                    <input name="cancel_return" type="hidden" value="<?= $ipnUrl; ?>Cubbyhole/view/pricing.php" />
                                    <input id="custom" name="custom" type="hidden" value="<?= $user->getId().'|'.$plan->getId() ?>" />
                                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                                </form>
                            <?php else: ?>
                                <form target="_blank" class="paypal" action="view/register.php" method="post" target="_top">
                                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                                </form>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>