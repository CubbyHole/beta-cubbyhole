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
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<?php
//appel de la barre menu
include_once '../header/menu.php';
?>
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
            $mongo =  AbstractPdoManager::instantiate();

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
    <script src="../content/js/bootstrap.min.js"></script>
    <script src="../content/js/theme.js"></script>

    <script type="text/javascript" src="../content/js/index-slider.js"></script>
 </body>
 </html>