<?php 
session_start();
include '../../config/db.class.php';
include '../../controller/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cubbyhole</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Styles -->
    <link href="../../content/css/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../content/css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../../content/css/compiled/index.css" type="text/css" media="screen" />    
    <link rel="stylesheet" type="text/css" href="../../content/css/lib/animate.css" media="screen, projection" /> 
    <link rel="stylesheet" href="../../content/css/style.css" type="text/css" media="screen" />     

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="pull_top">
    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                </button>
                <a href="../../index.php" class="navbar-brand"><strong>CUBBYHOLE</strong></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="view/about-us.php">ABOUT US</a></li>
                    <li><a href="view/pricing.php">PRICING</a></li>
                    <li><a href="view/contact.php">CONTACT US</a></li>
                    <?php 
                    //recupère la session du login
                    if($_SESSION == true)
                    { 
                        echo '<li><a href="view/account.php?id=<?php echo ">MY ACCOUNT</a></li>';
                        echo '<li><a href="view/logout.php">LOGOUT</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="view/register.php">REGISTER</a></li>';
                        echo '<li><a href="view/login.php">LOGIN</a></li>';
                    }   
/*<td><a href="view-post.php?id=<?php echo $post['_id'];?>">View</a></td>*/
                    ?>
                    <!--<li><a href="register.php">REGISTER</a></li>
                    <li><a href="login.php">LOGIN</a></li>-->

                    <?php if($_SESSION == true): //Mise en place d'un module Gravatar pour la photo de profil ?> 
                        <li><img class="img-circle" style="width: 50%;" src=<?php echo $_SESSION['email']; ?> ></li>                  
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
   <aside id="left-panel">
        <nav>
            <ul>
                <li class="active">
                    <a href="#dashboard.php" title="Dashboard"><i class="glyphicon glyphicon-home"></i> <span class="menu-item-parent">Dashboard</span></a>
                </li>
                <li>
                    <a href="#users.php" title="Users"><i class="glyphicon glyphicon-user"></i> <span class="menu-item-parent">Users</span></a>
                </li>
            </ul>
        </nav>

   </aside>

   <section id="main" role="main">
        <div>
        	<?php 
            //Instantiation de la bdd (connexion)
            $mongo =  DB::instantiate();

            //récupère la collection "users"
            $users_collection = $mongo->get_collection('user');

            //recupere tous les users
            $cursor = $users_collection->find();


            echo "<h3>Liste des Utilisateurs enregistrés</h3>";
            foreach ($cursor as $users) 
            {
        	echo $users['name'];
        	echo "  ||  ";
        	echo $users['email'];
        	echo "  ||  ";
            echo $users['password'];
        	echo "</br>";
            }

            ?>
        </div>
    </section>

        <div id="sidebar-wrapper" class="collapse sidebar-collapse">
        	<nav id="sidebar">
        		<ul id="main-nav" class="open-active">
        			<li></li>
        		</ul>
        	</nav>
        </div>
	
     <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
    <script src="../../content/js/theme.js"></script>

    <script type="text/javascript" src="../../content/js/index-slider.js"></script>
 </body>
 </html>