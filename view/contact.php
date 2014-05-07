<?php 
include '../header/header.php';
?>
    <!-- Styles -->
    <link href="../content/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../content/css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../content/css/compiled/theme.css" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="../content/css/compiled/contact.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../content/css/lib/animate.css" media="screen, projection" />

    <link rel="stylesheet" href="../content/css/style.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
<?php
include '../header/menu.php';
?>

    <div id="contact">
        <div id="formContact">
            <div class="container">
                <div class="section_header">
                    <h3>Contact us</h3>
                </div>
                <div class="row contact">

                    <form method="POST" action="/Cubbyhole/controller/mail.php">
                        <div class="row form">
                            <div class="col-sm-6 row-col">
                                <div class="box">
                                    <input name="nom" class="name form-control" type="text" placeholder="Name">
                                    <input name="email"class="mail form-control" type="text" placeholder="Email">
                                    <input name="phone" class="phone form-control" type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-6 msg">
                                <div class="box">
                                    <textarea name="mymsg" placeholder="Type a message here..." class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row submit">
                           <!-- <div class="col-md-5 box">
                                <label class="checkbox">
                                    <input type="checkbox"> Sign up for newsletter
                                </label>
                            </div>-->
                            <div class="col-md-3 right">
                                <input name="mail" type="submit" value="Send your message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="map">
            <!--<div class="container">
                <div class="box_wrapp">
                    <div class="box_cont">
                        <div class="head">
                            <h6>Contact</h6>
                        </div>
                        <ul class="street">
                            <li>2301 East Lamar Blvd. Suite 140.</li>
                            <li>City, Arlington. United States,</li>
                            <li>Zip Code, TX 76006.</li>
                            <li class="icon icontop">
                                <span class="contacticos ico1"></span>
                                <span class="text">1 817 274 2933</span>
                            </li>
                            <li class="icon">
                                <span class="contacticos ico2"></span>
                                <a class="text" href="#">bootstrap@twitter.com</a>
                            </li>
                        </ul>

                        <div class="head headbottom">
                            <h6>Work with us</h6>
                        </div>
                        <p>We’ve prepared a simple project planner to get to know you and your project better.</p>

                        <a href="#" class="btn">Let's get started</a>
                    </div>
                </div>
            </div>-->
            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps?f
            =q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=SUPINFO+M%C3%A2con,+Cours+de+l'%C3%89v%C3%AAque+Moreau,+M%C3%A2con,+France&amp;aq=0&amp;oq
            =supin&amp;sll=46.308047,4.839907&amp;sspn=0.017639,0.042272&amp;ie=UTF8&amp;hq=SUPINFO+M%C3%A2con,+Cours+de+l'%C3%89v%C3%AAque+Moreau,+
            M%C3%A2con,+France&amp;ll=46.308632,4.832744&amp;spn=0.006295,0.006295&amp;t=m&amp;output=embed"></iframe>
            <!--<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/?ie=UTF8&amp;ll=64.089157,-21.816616&amp;spn=0.045157,0.15398&amp;t=m&amp;z=13&amp;output=embed"></iframe>-->
        </div>


     <?php include '../footer/footer.php'; ?>