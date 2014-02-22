<?php 
include '../header/register.header.php'; 
require_once '../controller/functions.php';
?>

    <!-- Sign In Option 1 -->
    <div id="sign_up1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header">
                    <h4>Create your account</h4>
                </div>

                <div class="col-sm-3 division">
                    <div class="line l"></div>
                    <span>here</span>
                    <div class="line r"></div>
                </div>

                <div class="footer">
                    <form method="post" action="../controller/register.php" class="form">
                        <div class="form-group">
                            <input id="name" name="name" type="text" placeholder="Nom" class="form-control center" autofocus required>
                        </div>

                        <div class="form-group">
                            <input id="firstname" name="firstName" type="text" placeholder="Prenom" class="form-control center">
                        </div>

                        <div class="form-group">
                            <input id="email" name="email" type="text" placeholder="Email" class="form-control center">
                        </div>

                        <div class="form-group">
                            <input id="password" name="password" type="password" placeholder="Password" class="form-control center password" >
                        </div>

                        <div class="form-group">
                            <input id="passwordConfirmation" name="passwordConfirmation" type="password" placeholder="Confirm Password" class="form-control center password">
                        </div>
                        <!--Complexité du mot de passe -->
                        <div id="progressbar">
                            <div id="progress" class="progressbarInvalid" style="width: 0%;">
                                <div id="complexity">0%</div>
                            </div>
                        </div>

                        <input id="submit" name="add_user" value="Sign up" type="submit">
                    </form>
                </div>

                <!--<div class="col-md-5 remember">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div>-->

                <div class="col-md-12 dosnt">
                    <span>Already have an account?</span>
                    <a href="login.php">Sign in</a>
                </div>
            </div>
        </div>
    </div>

    <!-- starts footer -->
    <footer id="footer">
        <div class="container">
            <div class="row info">
                <div class="col-sm-6 residence">
                    <ul>
                        <li>2301 East Lamar Blvd. Suite 140. City, Arlington.</li>
                        <li>United States, Zip Code TX 76006.</li>
                    </ul>
                </div>
                <div class="col-sm-5 touch">
                    <ul>
                        <li><strong>P.</strong> 1 817 274 2933</li>
                        <li><strong>E.</strong><a href="#"> bootstrap@twitter.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row credits">
                <div class="col-md-12">
                    <div class="row social">
                        <div class="col-md-12">
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
                            © 2013 Clean Canvas. All rights reserved. Theme by Detail Canvas.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../content/js/bootstrap.min.js"></script>
    <script src="../content/js/theme.js"></script>
    <script src="../content/js/jquery.complexify.js"></script>

    <script type="text/javascript">

        $(function () {

            //Cache le progress bar
            $("#progressbar").hide();

            //traitement de la complexité du mdp
            $("#password").complexify({}, function (valid, complexity) {
                
                if (!valid) {
                    $('#progress').css({'width':complexity + '%'}).removeClass('progressbarValid').addClass('progressbarInvalid');
                } else {
                    $('#progress').css({'width':complexity + '%'}).removeClass('progressbarInvalid').addClass('progressbarValid');
                }

                $('#complexity').html(Math.round(complexity) + '%');

            });
            

            //affiche la div progressBar quand tape clavier
            $( "input:password" ).keydown(function( event ) {
              if ( event.which == 13 ) {
               event.preventDefault();
              }
              $("#progressbar").show();
              
            });

            //Message erreur au submit
            $( "#submit" ).click(function() {           
                //stocke la valeur des champs input en variable
                var nameVal = $("#name").val();
                var firstnameVal = $("#firstname").val();
                var emailVal = $("#email").val();
                var passwordVal = $("#password").val();
                var passwordCheckVal = $("#passwordConfirmation").val();

                //notre expression regulière pour la verification de la validité du mail
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                var hasError = false;

                //cache le span
                $(".error").hide();

                //Si champ name est vide
                if (nameVal == '') 
                {   

                    //insere notre message d'erreur apres la div du password
                    $("#name").after('<span class="error">Veuillez rentrer un nom.</span>');
                    //erreur = 1
                    hasError = true;
                } 
                //Sinon si firstname est vide
                else if (firstnameVal == '') 
                {

                    //insere notre message d'erreur apres la div du passwordConfirmation
                    $("#firstname").after('<span class="error">Veuillez rentrer un prenom.</span>');
                    //erreur = 1
                    hasError = true;
                } 
                //Sinon si email est vide
                else if (emailVal == '') 
                {
                    //insere notre message d'erreur apres la div du passwordConfirmation
                    $("#email").after('<span class="error">Veuillez rentrer un email.</span>');
                    //erreur = 1
                    hasError = true;
                }
                //Test de la validité du mail
                else if(!emailReg.test(emailVal)) 
                {
                    $("#email").after("<span class='error'>Votre email n'est pas valide.</span>");
                    hasError = true;
                }
               //Sinon si password est vide
                else if (passwordVal == '' )
                {  
                    //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
                    $("#password").after('<span class="error">Veuillez rentrer un mot de passe.</span>');
                    //erreur = 1
                    hasError = true;
                }
               
                //Verification de la correspondance des mdp
                else if (passwordVal == nameVal )
                { 
                    //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
                    $("#password").after('<span class="error">Votre mot de passe doit être different de votre nom.</span>');
                    //erreur = 1
                    hasError = true;
                }
                 //Verification de la correspondance des mdp
                else if (passwordVal == firstnameVal )
                { 
                    //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
                    $("#password").after('<span class="error">Votre mot de passe doit être different de votre prenom.</span>');
                    //erreur = 1
                    hasError = true;
                }
                //verifie que le mot de passe ne soit pas égal à l'email
                else if (passwordVal == emailVal )
                { 
                    //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
                    $("#password").after('<span class="error">Votre mot de passe doit être different de votre email.</span>');
                    //erreur = 1
                    hasError = true;
                }
                 //Verification de la correspondance des mdp
                else if (passwordVal != passwordCheckVal )
                {

                    //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
                    $("#passwordConfirmation").after('<span class="error">Votre mot de passe ne correspond pas.</span>');
                    //erreur = 1
                    hasError = true;
                }

                //sécurité du submit! Si erreur on valide pas
                if(hasError == true) { return false; }
                /*else {
                    $("#submit").after('<span class="error">Mot de passe accepted.</span>');
                    return false;
                    }*/

            });

         });
    </script>
</body>
</html>