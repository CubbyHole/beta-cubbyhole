<?php
include'../header/header.php';
?>
    <!-- Styles -->
    <link rel="stylesheet" href="../content/css/bootstrap/bootstrap.min.css"  />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/compiled/theme.css" type="text/css" />


    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../content/css/compiled/sign-up.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="../content/css/style.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
<?php
include '../header/menu.php';
if (isset($_SESSION['user'])):
    getUserDetails();
    $userManager = new UserPdoManager();
    $accountManager = new AccountPdoManager();
    $refManager = new RefPlanPdoManager();

    //Récupère les dates d'enregistrement et de fin d'abonnement
    $userStartDate = $user->getCurrentAccount()->getStartDate();
    $userEndDate = $user->getCurrentAccount()->getEndDate();

    //Formatage des dates pour une meilleur lisibilité humaine
    $userFormatStartDate = AbstractPdoManager::formatMongoDate($userStartDate);
    $userFormatEndDate = AbstractPdoManager::formatMongoDate($userEndDate);

    //Requête BDD
    $userInSession = unserialize($_SESSION['user']);
    $user = $userManager->findById($userInSession->getId());//retrouve l'user connecté grâce à l'id en session
    $userAccount = $accountManager->findById($user->getCurrentAccount());//retrouve le compte user
    $userPlan = $refManager->findById($userAccount->getRefPlan());//retrouve le plan user


    ?>
    <body style="overflow: hidden;">
    <aside id="left-panel">
        <nav id="asideNavBar">
            <ul>
                <!--Lien Aside -->
                <li class="">
                    <a href="change.php" title="Change your password"><span class="menu-item-parent">Change password</span></a>
                </li>
                <li class="">
                    <a href="pricing.php" title="Change your plan"><span class="menu-item-parent">Change plan</span></a>
                </li>
                <li class="">
                    <a href="#" title="File explorer"><span class="menu-item-parent">My file explorer</span></a>
                </li>
            </ul>
        </nav>
        <div id="buttCollapse">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </div>
    </aside>

    <div id="afterBody">
        <div id="main">
            <div id="dash">
                <?php
                //récupère le nom du plan acheté par l'user en cours
                switch($userPlan->getName())
                {
                    case 'Free':
                        $typePlan = 0;
                        break;
                    case 'Premium':
                        $typePlan = 1;
                        break;
                    case 'Ultimate':
                        $typePlan = 2;
                        break;
                }
                ?>
                <h2 class="h2-account">
                    <i id="dashHead" class="glyphicon glyphicon-home"></i>
                    My account
                <span>
                    <?php
                    if($typePlan > 0 )://Gestion du Badge, aucun badge pour Free User
                        if($typePlan == 1): //Badge Premium?>
                            <img class="badge-account-img" src="../content/img/icons/Premium.png">
                        <?php elseif($typePlan == 2)://Badge Ultimate ?>
                            <img class="badge-account-img" src="../content/img/icons/Ultimate.png">
                        <?php endif ?>
                    <?php endif ?>
                </span>
                </h2>
                <hr class="ligne-account-separation">

                <div id="allInfo" class="container">

                    <div id="info" class="cat-user col-md-3">
                        <h3><i style="margin-right: 5px;" class="glyphicon glyphicon-user"></i>Information</h3>
                        <table class="mainTab">
                            <tr>
                                <td class="tabInfo">Name</td>
                                <td class="tabValue"><?= $user->getLastName().' '.$user->getFirstname() ?></td>
                            </tr>
                            <tr>
                                <td class="tabInfo">E-mail</td>
                                <td class="tabValue"><?= $user->getEmail() ?></td>
                            </tr>
                            <tr>
                                <td class="tabInfo">Registration date</td>
                                <td class="tabValue"><?php echo $userFormatStartDate['date'];  ?></td>
                            </tr>
                            <tr>
                                <td class="tabInfo">End date</td>
                                <td class="tabValue"><?php echo $userFormatEndDate['date'];  ?></td>
                            </tr>
                        </table>
                    </div>

                    <div id="plan" class="cat-user col-md-5">
                        <h3><i style="margin-right: 5px;" class="glyphicon glyphicon-inbox"></i>Storage</h3>
                        <table class="mainTab">
                            <tr>
                                <td class="tabInfo">Plan</td>
                                <td class="tabValue">
                                    <div class="account-plan-name"><?= $userPlan->getName() ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabInfo">Data traded today</td>
                                <td class="tabValue"><progress id="progressRatio" data-toggle="tooltip" title="<?= convertKilobytes($userAccount->getRatio())?>&nbsp;Mb" value="<?= convertKilobytes($userAccount->getRatio()) //Volume de données échangées(Upload + Download) le jour-même ?>"
                                                               min="0" max="<?= convertKilobytes($userPlan->getMaxRatio()) //Volume que j'ai le droit d'echanger par jour ?>"></progress>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <p id="minRatioVal" class="storageVal">0</p>
                                    <p id="maxRatioVal" class="storageVal"><?= convertKilobytes($userPlan->getMaxRatio()) ?>&nbsp;Mb</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabInfo">Capacity storage</td>
                                <td class="tabValue"><progress id="progressStorage"  data-toggle="tooltip" title="<?= convertKilobytes($userAccount->getStorage())?>&nbsp;Mb" value="<?= convertKilobytes($userAccount->getStorage()) ?>"
                                                               min="0" max="<?= convertKilobytes($userPlan->getMaxStorage()) ?>"></progress>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <p id="minStorageVal" class="storageVal">0</p>
                                    <p id="maxStorageVal" class="storageVal"><?= convertKilobytes($userPlan->getMaxStorage()) ?>&nbsp;Mb</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="speed" class="cat-user col-md-3">
                        <h3><i style="margin-right: 5px;" class="glyphicon glyphicon-stats"></i>Bandwidth</h3>
                        <table class="mainTab">
                            <tr>
                                <td class="tabInfo">Download speed limitation</td>
                                <td class="tabValue"><?= $userPlan->getDownloadSpeed() ?>&nbsp;Kb/s</td>
                            </tr>
                            <tr>
                                <td class="tabInfo">Upload speed limitation</td>
                                <td class="tabValue"><?= $userPlan->getUploadSpeed() ?>&nbsp;Kb/s</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>
<?php endif ?>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../content/js/bootstrap.min.js"></script>
    <script src="../content/js/theme.js"></script>
    <script>
        $(function()
        {

            $('#progressRatio').tooltip({
                placement: 'top'
            });
            $('#progressStorage').tooltip({
                placement: 'top'
            });

        });
    </script>
<?php //include '../footer/footer.php'; ?>