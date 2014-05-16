<?php include '../header/header.php';?>
    <!-- Styles -->
    <link href="../content/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../content/css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../content/css/compiled/pricing.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../content/css/lib/animate.css" media="screen, projection" />

    <link rel="stylesheet" href="../content/css/style.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
<?php
include '../header/menu.php';
?>

<?php
if(isset($_SESSION['paypal'])):
    var_dump($_SESSION['paypal']);
    ?>
    <div class="alert alert-success">
        Congrulation, you are now Premium!!
    </div>
    <!--$ses = $_SESSION['paypal'];
    $session = unserialize($ses);
    //$grav = unserialize($_SESSION);
    var_dump($session);-->
    <?php endif ?>



    <!-- Pricing Option3 -->
    <div id="in_pricing2">
        <div class="container">
            <div class="section_header">
                <h3>Pricing</h3>
            </div>

            <div class="row charts_wrapp">
                <!-- Plan Box -->
                <div class="col-sm-3">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Free</h3>

                            <div class="price">

                                <span class="qty">10</span>
                                <span class="month">Go</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>1</strong>
                                    files / DL
                                </p>
                                <p>
                                    <strong>140ko/s</strong>
                                    bandwich
                                </p>
                                <p>
                                    <strong>30</strong>
                                    days of storage
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="col-sm-3">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Premium</h3>
                            <div class="price">
                                <span class="dollar">€</span>
                                <span class="qty">10</span>
                                <span class="month">/month</span>
                            </div>
                            <div class="price">

                                <span class="qty">250</span>
                                <span class="month">Go</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>Multiple</strong>
                                    files / DL
                                </p>
                                <p>
                                    <strong>1Mb/s</strong>
                                    bandwich
                                </p>
                                <p>
                                    <strong>Unlimited</strong>
                                    days of storage
                                </p>
                            </div>

                            <form class="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="BX5Q3MK47TUDQ">
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                            </form>


                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="col-sm-3">
                    <div class="plan">
                        <div class="wrapper">

                            <h3>Ultimate</h3>
                            <div class="price">
                                <span class="dollar">€</span>
                                <span class="qty">15</span>
                                <span class="month">/month</span>
                            </div>
                            <div class="price">

                                <span class="qty">500</span>
                                <span class="month">Go</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>10</strong>
                                    Shared Projects
                                </p>
                                <p>
                                    <strong>25</strong>
                                    Team Members
                                </p>
                                <p>
                                    <strong>Unlimited</strong>
                                    Storage
                                </p>
                                <p>
                                    <strong>Plus</strong>
                                    Phone Support
                                </p>
                            </div>

                            <form class="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="N9X3E9UW4D6RJ">
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="col-sm-3 ultra">
                    <div class="plan">
                        <div class="wrapper">
                            <img class="ribbon" src="../content/img/badge.png">
                            <h3>Custom</h3>

                            <div class="features">
                                <p>
                                    <strong>10</strong>
                                    Shared Projects
                                </p>
                                <p>
                                    <strong>4</strong>
                                    Team Members
                                </p>
                                <p>
                                    <strong>10</strong>
                                    Storage
                                </p>
                            </div>
                            <a class="order" href="#">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />




<?php include '../footer/footer.php'; ?><?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 05/04/14
 * Time: 15:11
 */ 