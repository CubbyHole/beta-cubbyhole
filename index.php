<?php
include 'header/index.header.php';

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

        <article class="slide" id="ideas" style="background: url('content/img/backgrounds/aqua.jpg') repeat-x top center;">
            <div class="info">
                <h2>We love to turn ideas into beautiful things.</h2>
            </div>
            <img class="asset left-480 sp600 t260 z1" src="content/img/slides/scene2/left.png" />
            <img class="asset left-210 sp600 t213 z2" src="content/img/slides/scene2/middle.png" />
            <img class="asset left60 sp600 t260 z1" src="content/img/slides/scene2/right.png" />
        </article>

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
    
<?php var_dump($_SESSION['user']); ?>
    <div id="showcase">

        <div class="container">

            

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
                            5Go / 10Go / Unlimited
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="features">
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
    </div>


    <!-- Pricing Option -->
    <div id="in_pricing">
        <div class="container">
            <div class="section_header">
                <h3>Pricing</h3>
            </div>

            <div class="row charts_wrapp">
                <!-- Plan Box -->
                <div class="col-sm-4">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Free</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">0</span> 
                                <span class="month">/month</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>5</strong>
                                    Go
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
                            <a class="order" href="pricing.php">ORDER NOW</a>
                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="col-sm-4 pro">
                    <div class="plan">
                        <div class="wrapper">
                            <img class="ribbon" src="content/img/badge.png">
                            <h3>Ultimate</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">99</span> 
                                <span class="month">/month</span>
                            </div>
                            <div class="features">
                               
                                <p>
                                    <strong>No</strong>
                                    Advertising
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
                            <a class="order" href="pricing.php">ORDER NOW</a>
                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="col-sm-4 standar">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Premium</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">65</span> 
                                <span class="month">/month</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>20</strong>
                                    Go
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
                            <a class="order" href="pricing.php">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <?php include 'footer/footer.php'; ?>