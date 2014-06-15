<?php
$projectRoot = $_SERVER['DOCUMENT_ROOT'] . '/Cubbyhole';
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

    <article class="slide" id="tour" style="background: url('content/img/slides/coffre1.png') 50% 45% repeat-x;">
        <!--<img class="asset left-472 sp650 t210 z3" src="content/img/slides/scene3/ipad.png"/>-->
        <div class="info">
            <h2>Trust</h2>
            <p class="description-slide" style="margin-top: 40px;">You trust us with your data, security and reliability means a lot to us</p>
        </div>
    </article>

    <article class="slide" id="showcasing" style="background: url('content/img/slides/nature.png') 50% 58% repeat-x  ;">
        <img style="height: 332px;" class="asset left480 sp600 t120 z1 ampoule" src="content/img/slides/Eco_friendly.png"/>
        <div class="info">
            <h2>Eco-friendly</h2>
            <p class="description-slide" style="margin-top: 40px;">We don't want you to harm our planet by using our services</p>
        </div>
    </article>

    <!--<article class="slide" id="responsive" style="background: url('content/img/slides/entreprise1.png') 15% 15% repeat-x ;">-->
    <article class="slide" id="responsive" style="background: url('content/img/slides/path.png') 15% 65% repeat-x ;">
        <!--<img id="evolution" style="height: 220px;" class="asset left400 sp600 t120 z3" src="content/img/slides/planet.png"/>-->
        <!--<img id="evolution" style="height: 335px;" class="asset left362 sp600 t120 z3" src="content/img/slides/evolve.png"/>
        <!--<img id="evolution" style="height: 335px;" class="asset left300 sp600 t120 z3" src="content/img/slides/man.png"/>
        <img id="evolution" style="height: 335px;" class="asset left362 sp600 t120 z3" src="content/img/slides/woman.png"/>
        <img id="evolution" style="height: 335px;" class="asset left362 sp600 t120 z3" src="content/img/slides/evolve.png"/>-->

        <div class="info" style="text-align: center;">
            <h2>Constant evolution</h2>
            <p class="description-slide" style="color:white;">We are newcomers, therefore our hears are open to suggestion and feedback</p>
        </div>
    </article>
</section>

</br>
<?php
if (isset($_SESSION['user'])) {
    $info = unserialize($_SESSION['user']);

    //$u = getUserDetails($_SESSION['user']);
    //var_dump($info->getCurrentAccount()->getRefPlan()->getName());
    var_dump($info);
}
?>
<section id="showcase" class="section">
    <div class="sectionWrap">

            <div class="copy"><h2 id="firstSectionTitle">Cubbyhole multiplateforme</h2>
                <p style="font-size: 24px; line-height: 34.8px;">Cubbyhole, the best online storage offers free access wherever you are.</p>
            </div>
            <div class="content"> <!--style="height: 573px;"-->
                <div class="appSec webApp col-lg-6">
                    <h4 class="anywhere">Cubbyhole for the Web</h4>
                    <img id="imgNestbox" class="appGraphic img-responsive" src="content/img/icons/Mac_browser.png">
                </div>
                <div class="appSec mobileApps col-lg-6">
                    <h4 class="anywhere">Cubbyhole for Mobile</h4>
                    <img style="width: 300px;" class="appGraphic img-responsive" src="content/img/icons/sunbeam_phone.png">
                </div>
            </div>

    </div>
</section>
<div class="separe"></div>
<section id="showcase2" class="section">
    <div class="sectionWrap">
        <div class="copy"><h2 style="font-size: 48px; line-height: 72px;">Coming soon</h2>
            <p style="font-size: 24px; line-height: 34.8px;">We are working hard to get as many useful utilities as possible.</p></div>
        <div class="content" >
            <div class="appSec">
                <img class="appGraphic" src="content/img/icons/MacBook_Windove.png">
            </div>
        </div>
    </div>
    </div>
</section>
<!--<div class="separe"></div>

<section id="showcase" class="section">
    <div class="sectionWrap">
        <div class="copy"><h2 style="font-size: 48px; line-height: 72px;">Share your media</h2>
            <p style="font-size: 24px; line-height: 34.8px;">Share your media as media. Your photos, videos, songs, and documents are more than just files.
                On Cubbyhole you can share, view, and listen to over different file formats - all right in your web browser or mobile device - all right in your web browser or mobile device.</p></div>
        <div class="content" style="height: 573px;">
            <div class="appSec">
                <img class="appGraphic" src="content/img/icons/Mac.png">
            </div>
        </div>
    </div>
    </div>
</section>
<div class="separe"></div>
<section id="showcase" class="section">
    <div class="sectionWrap">
        <div class="copy"><h2 style="font-size: 48px; line-height: 72px;">Your security is our priority</h2>
            <p style="font-size: 24px; line-height: 34.8px;">Your files are stored securely and privately and are always available to you.You can connected wherever you are safe.</p></div>
        <div class="content" style="height: 573px;">
            <div class="appSec">
                <img class="appGraphic" src="content/img/icons/Apple_devices_security.png">
            </div>
        </div>
    </div>
    </div>
</section>-->


