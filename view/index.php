<?php
$projectRoot = $_SERVER['HTTP_HOST'] . '/Cubbyhole';
?>
<!-- Styles -->
<link href="content/css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" xmlns="http://www.w3.org/1999/html"/>
<link rel="stylesheet" href="content/css/compiled/bootstrap-overrides.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="content/css/compiled/theme.css"/>

<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
      rel='stylesheet' type='text/css'/>

<link rel="stylesheet" href="content/css/compiled/index.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="content/css/lib/animate.css" media="screen, projection"/>
<link rel="stylesheet" type="text/css" href="content/css/style.css" media="screen, projection"/>

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
    <article class="slide" id="showcasing"
             style="background: url('content/img/backgrounds/deep-green.jpg') repeat-x top center;">
        <img class="asset left250 sp600 t120 z1" src="content/img/slides/scene4/my.png"/>

        <div class="info">
            <h2>MongoDB</h2>

            <p style="color:white;">Performance, speed</p>
        </div>
    </article>

    <article class="slide" id="tour"
             style="background: url('content/img/backgrounds/color-splash.jpg') repeat-x top center;">
        <img class="asset left-472 sp650 t210 z3" src="content/img/slides/scene3/ipad.png"/>
        <img class="asset left-365 sp600 t270 z4" src="content/img/slides/scene3/iphone5.png"/>
        <img class="asset left-350 sp450 t135 z2" src="content/img/slides/scene3/desktop2.png"/>

        <div class="info">
            <h2>Fully Responsive Cubbyhole theme</h2>
            <!--<a href="features.php">TOUR THE PRODUCT</a>-->
        </div>
    </article>

    <article class="slide" id="responsive"
             style="background: url('content/img/backgrounds/indigo.jpg') repeat-x top center;">
        <img class="asset left-472 sp600 t120 z3" src="content/img/slides/scene4/html5.png"/>
        <img class="asset left-190 sp500 t120 z2" src="content/img/slides/scene4/css3.png"/>

        <div class="info">
            <h2>
                Responsive <strong>HTML5 & CSS3</strong>
                Theme
            </h2>
        </div>
    </article>
</section>
</br>
<?php
if (isset($_SESSION['user'])) {
    $info = unserialize($_SESSION['user']);

    //$u = getUserDetails($_SESSION['user']);
    var_dump($info->getCurrentAccount()->getRefPlan()->getName());
    var_dump($info);
}
?>
<section id="showcase" class="section">
    <div class="sectionWrap">
        <div class="copy"><h2 style="font-size: 48px; line-height: 72px;">Cubbyhole anywhere you go</h2>
            <p style="font-size: 24px; line-height: 34.8px;">Cubbyhole, the best online storage offers free access wherever you are.</p></div>
        <div class="content" style="height: 573px;">
            <div class="appSec webApp">
                <h4 style="padding-left: 89px;" class="anywhere">Cubbyhole for the Web</h4>
                <a class="signUp">
                    <img style="height: 395px;" class="appGraphic" src="content/img/icons/Mac_browser.png">
                </a>

            </div>
            <div style="padding-left: 185px;" class="appSec mobileApps">
                <h4 class="anywhere">Cubbyhole Mobile</h4>
                <a href="#">
                    <img style="width: 300px;" class="appGraphic" src="content/img/icons/iphone_android.png">
                </a>

            </div>
        </div>
    </div>
</section>
<hr>
<section id="showcase" class="section">
    <div class="sectionWrap">
        <div class="copy"><h2 style="font-size: 48px; line-height: 72px;">Share your media</h2>
            <p style="font-size: 24px; line-height: 34.8px;">Share your media as media. Your photos, videos, songs, and documents are more than just files.
                On Cubbyhole you can share, view, and listen to over different file formats - all right in your web browser or mobile device - all right in your web browser or mobile device.</p></div>
        <div class="content" style="height: 573px;">
           <img class="appGraphic" src="content/img/icons/Mac.png">
        </div>
        </div>
    </div>
</section>
<hr>
<section id="showcase" class="section">
    <div class="sectionWrap">
        <div class="copy"><h2 style="font-size: 48px; line-height: 72px;">Your security is our priority</h2>
            <p style="font-size: 24px; line-height: 34.8px;">Your files are stored securely and privately and are always available to you.You can connected wherever you are safe.</p></div>
        <div class="content" style="height: 573px;">
            <img class="appGraphic" src="content/img/icons/Apple_devices_security.png">
        </div>
    </div>
    </div>
</section>
