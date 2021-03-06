<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 11/03/14
 * Time: 02:00
 */
?>
<!-- starts footer -->
    <footer id="footer">
        <div class="container">
            <div class="row info">
                <div class="col-sm-6 residence">
                    <ul>
                        <li>16 Cours de l'Évêque Moreau</li>
                        <li>71000 Mâcon, France</li>
                    </ul>
                </div>
                <div class="col-sm-5 touch">
                    <ul>
                        <li><strong>SUPINFO</strong> +33 1 53 35 97 00</li>
                        <li><strong>A.</strong><a href="#">125637@supinfo.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row credits">
                <div class="col-md-12">
                    <div class="row social">
                        <div class="span12">
                            <a href="#" class="facebook">
                                <span class="socialicons ico1"></span>
                                <span class="socialicons_h ico1h"></span>
                            </a>
                            <a href="#" class="twitter">
                                <span class="socialicons ico2"></span>
                                <span class="socialicons_h ico2h"></span>
                            </a>
                            <a href="#" class="gplus">
                                <span class="socialicons ico3"></span>
                                <span class="socialicons_h ico3h"></span>
                            </a>
                            <a href="#" class="flickr">
                                <span class="socialicons ico4"></span>
                                <span class="socialicons_h ico4h"></span>
                            </a>
                            <a href="#" class="pinterest">
                                <span class="socialicons ico5"></span>
                                <span class="socialicons_h ico5h"></span>
                            </a>
                            <a href="#" class="dribble">
                                <span class="socialicons ico6"></span>
                                <span class="socialicons_h ico6h"></span>
                            </a>
                            <a href="#" class="behance">
                                <span class="socialicons ico7"></span>
                                <span class="socialicons_h ico7h"></span>
                            </a>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-md-12">
                            © 2014 Cubbyhole. SUPINFO International.
                        </div>
                        <div class="col-md-12">
                            <a class="linkTerms" href="terms.php" target="_blank">Terms of services</a>
                            <a class="linkTerms" href="privacy.php" target="_blank">Privacy policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
    <script src="content/js/jquery.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
    <script src="content/js/theme.js"></script>
    <script src="content/js/index-slider.js"></script>
    <!--<script type="text/javascript" src="content/js/flexslider.js"></script>-->
    <script src="content/js/top.js"></script>
<script>
    $(function() {

        // Alerte de déconnexion
        $( '#cross' ).on( 'click', function( e )
        {
            if( confirm( 'You want to disconnect ?' ) )
                return true;

            return false;
        });

    });
</script>

</body>
</html>