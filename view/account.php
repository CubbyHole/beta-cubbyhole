<?php
include'../header/header.php';
?>
    <!-- Styles -->
    <link rel="stylesheet" href="../content/css/bootstrap/bootstrap.min.css"  />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" href="../content/css/compiled/theme.css" type="text/css" />

    <link rel="stylesheet" href="../content/css/style.css" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../content/css/compiled/sign-up.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" media="screen" href="../content/css/smartadmin-production.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../content/css/smartadmin-skins.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../content/css/demo.css">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
<?php
include '../header/menu.php';
?>
    <aside id="left-panel">
        <!-- end user info -->

        <!-- NAVIGATION : This navigation is also responsive

        To make this navigation dynamic please make sure to link the node
        (the reference to the nav > ul) after page load. Or the navigation
        will not initialize.
        -->
        <nav>
            <!-- NOTE: Notice the gaps after each icon usage <i></i>..
            Please note that these links work a bit different than
            traditional href="" links. See documentation for details.
            -->

            <ul>
                <!--Dashboard -->
                <li class="">
                    <a href="dashboard.php" title="Dashboard"><span class="menu-item-parent">Account</span></a>
                </li>

                <!--<li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">UI Elements</span></a>
                    <ul>
                        <li>
                            <a href="ajax/general-elements.html">General Elements</a>
                        </li>
                        <li>
                            <a href="ajax/buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="#">Icons</a>
                            <ul>
                                <li>
                                    <a href="ajax/fa.html"><i class="fa fa-plane"></i> Font Awesome</a>
                                </li>
                                <li>
                                    <a href="ajax/glyph.html"><i class="glyphicon glyphicon-plane"></i> Glyph Icons</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="ajax/grid.html">Grid</a>
                        </li>
                        <li>
                            <a href="ajax/treeview.html">Tree View</a>
                        </li>
                        <li>
                            <a href="ajax/nestable-list.html">Nestable Lists</a>
                        </li>
                        <li>
                            <a href="ajax/jqui.html">JQuery UI</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-folder-open"></i> <span class="menu-item-parent">6 Level Navigation</span></a>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-folder-open"></i> 2nd Level</a>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-folder-open"></i> 3ed Level </a>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-folder-open"></i> 4th Level</a>
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-fw fa-folder-open"></i> 5th Level</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-folder-open"></i> Folder</a>

                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-folder-open"></i> 3ed Level </a>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ajax/calendar.html"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Calendar</span></a>
                </li>
                <li>
                    <a href="ajax/widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Widgets</span></a>
                </li>
                <li>
                    <a href="ajax/gallery.html"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Gallery</span></a>
                </li>
                <li>
                    <a href="ajax/gmap-xml.html"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">Google Map Skins</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> <span class="menu-item-parent">Miscellaneous</span></a>
                    <ul>
                        <li>
                            <a href="ajax/typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="ajax/pricing-table.html">Pricing Tables</a>
                        </li>
                        <li>
                            <a href="ajax/invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="login.html" target="_top">Login</a>
                        </li>
                        <li>
                            <a href="register.html" target="_top">Register</a>
                        </li>
                        <li>
                            <a href="lock.html" target="_top">Locked Screen</a>
                        </li>
                        <li>
                            <a href="ajax/error404.html">Error 404</a>
                        </li>
                        <li>
                            <a href="ajax/error500.html">Error 500</a>
                        </li>
                        <li>
                            <a href="ajax/blank_.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="ajax/email-template.html">Email Template</a>
                        </li>
                        <li>
                            <a href="ajax/search.html">Search Page</a>
                        </li>
                        <li>
                            <a href="ajax/ckeditor.html">CK Editor</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-file"></i> <span class="menu-item-parent">Other Pages</span></a>
                    <ul>
                        <li>
                            <a href="ajax/forum.html">Forum Layout</a>
                        </li>
                        <li>
                            <a href="ajax/profile.html">Profile</a>
                        </li>
                        <li>
                            <a href="ajax/timeline.html">Timeline</a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </nav>
    </aside>


    <div id="main">
        <div id="dash">
            <h2 ><i id="dashHead" class="glyphicon glyphicon-home"></i>My account</h2>
            <hr style="margin-left: -20px;">
            <?php


            if (isset($_SESSION['user'])):
                $userManager = new UserPdoManager();
                $accountManager = new AccountPdoManager();
                $refManager = new RefPlanPdoManager();

                //variables
                $mongoDate = $user->getCurrentAccount()->getStartDate();
                $mongoDateFinale = AbstractPdoManager::formatMongoDate($mongoDate);

                //Requête BDD
                $userInSession = unserialize($_SESSION['user']);
                $user = $userManager->findById($userInSession->getId());
                $userAccount = $accountManager->findById($user->getCurrentAccount());
                $userPlan = $refManager->findById($userAccount->getRefPlan());
                //D
                ?>
                <div id="info" class="cat-user">
                    <h3><i class="glyphicon glyphicon-user"></i>Informations</h3>
                    Hello : <?= $user->getLastName().' '.$user->getFirstname() ?>
                    <br />
                    Registration date : <?php echo $mongoDateFinale['date'];  ?>
                </div>

                <div id="plan" class="cat-user">
                    <h3><i class="glyphicon glyphicon-inbox"></i>Plan</h3>
                    Plan : <?= $userPlan->getName() ?>
                    <br />
                    Storage capacity  : <span><progress id="progressStorage" value="<?= $userAccount->getStorage() ?>" min="0" max="<?= $userPlan->getMaxStorage() ?>"></progress><?= $userAccount->getStorage().'/'.$userPlan->getMaxStorage() ?>Go</span>
                    <br />
                    Download speed limitation : <?= $userPlan->getDownloadSpeed() ?>Kb/s
                    <br />
                    Upload speed limitation : <?= $userPlan->getUploadSpeed() ?>Kb/s
                    <br />
                    Data traded : <span><progress id="progressStorage" value="<?= $userAccount->getRatio() //Volume de données échangées(Upload + Download) le jour-même ?>"
                                        min="0" max="<?= $userPlan->getMaxRatio() //Volume que j'ai le droit d'echanger par jour ?>"></progress><?= $userAccount->getRatio().'/'.$userPlan->getMaxRatio() ?>Go</span>
                </div>



            <?php endif ?>
        </div>

    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        /*$(function() {

         function modifValues() {
         var val = $('#progress progress').attr('value');
         if (val >= 100) {
         val = 0;
         }
         var newVal = val * 1 + 0.25;
         var txt = Math.floor(newVal) + '%';

         $('#progress progress').attr('value', newVal);
         $('#progress progress span').text(txt);
         $('#progress strong').html(txt);
         }

         setInterval(function() {
         modifValues();
         }, 40);

         });*/
    </script>
<?php //include '../footer/footer.php'; ?>