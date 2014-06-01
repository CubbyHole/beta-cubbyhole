<?php
include '../header/header.php';
$ipnUrl = 'http://70e0cd43.ngrok.com/';
?>
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
$refPlanPdoManager = new RefPlanPdoManager();

//Plan Fre
$freePlans = $refPlanPdoManager->findFreePlans();

//Plan Premium
$premiumPlans = $refPlanPdoManager->findPremiumPlans();

$bannière_premium = "<img src='../content/img/icons/bannière_premium.png'>";
//$bannière_premium = 'Vous êtes Premium';
$bannière_ultimate = $projectRoot.'/content/img/icons/bannière_ultimate.png';

$_SESSION['helloPremium'] = $bannière_premium;
$helloPremium = false;

?>
    <!-- Pricing Option3 -->
    <div id="in_pricing2">
        <?php if(isset($_SESSION['user']))
        {
            //recharge la session avec les nouvelles données
            getUserDetails();

            //condition d'affichage de la bannière une fois l'user revenu sur la page
            $refPlanName = unserialize($_SESSION['user']);

            //recupère le nom du plan en session
            switch($refPlanName->getCurrentAccount()->getRefPlan()->getName())
            {
                case 'Free':
                    $bannière = 0;
                    break;
                case 'Premium':
                    $bannière = 1;
                    /*if(isset($_SESSION['helloPremium']))
                    {
                        echo '<div class="alert alert-info">';
                        echo $_SESSION['helloPremium'];
                        echo '</div>';
                    }
                    unset($_SESSION['helloPremium']);*/
                    break;
                case 'Ultimate':
                    $bannière = 2;
            }

            /*if($bannière > 0)
            {
                if($bannière == 1)
                {
                    $criteria = array(
                        'etat' => $bannière,
                        'srcImg' => $bannière_premium
                    );
                    $_SESSION['HelloPremium'] = $criteria;

                    if(isset($_SESSION['HelloPremium']))
                    {
                        echo '<div class="alert alert-info">';
                        echo $_SESSION['HelloPremium']['srcImg'];
                        echo '</div>';


                        //var_dump($_SESSION['HelloPremium']);
                    }
                    // unset($_SESSION['HelloPremium']['srcImg']);
                }
                elseif($bannière == 2)
                {
                    echo '<div class="alert alert-success">
                                    $bannière_ultimate;
                              </div>';
                }

            }*/

        }   ?>
        <div class="container">
            <?php if(isset($_SESSION['user']))
            {
                var_dump(unserialize($_SESSION['user']));

            } ?>
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

                                        <form target="_blank" class="paypal" action="register.php" method="post" target="_top">
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
                                    echo '<img class="ribbon" src="../content/img/badge.png">';
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
                                        <input name="return" type="hidden" value="http://localhost:8081/Cubbyhole/view/pricing.php" />
                                        <input name="cancel_return" type="hidden" value="http://localhost:8081/Cubbyhole/view/pricing.php" />
                                        <input id="custom" name="custom" type="hidden" value="<?= $user->getId().'|'.$plan->getId() ?>" />
                                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit"
                                               alt="PayPal - The safer, easier way to pay online!">
                                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                                <?php else: ?>
                                    <form target="_blank" class="paypal" action="register.php" method="post" target="_top">
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
    <br />
<?php include '../footer/footer.php'; ?>