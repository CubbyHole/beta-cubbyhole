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
                            <input id="name" name="name" type="text" placeholder="Nom" class="form-control center" autofocus >
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
                        <div class="form-group">
                            <div id="progressbar" >
                                <div id="progress" class="progressbarInvalid" style="width: 0%;">
                                    <div id="complexity" class="noticeInvalid"></div>
                                </div>
                            </div>
                            <p id="notice" class="noticeInvalid">Strenght password</p>
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
            //Cache la notice
            $("#notice").hide();

            //traitement de la complexité du mdp
            $("#password").complexify({}, function (valid, complexity)
            {

                if (!valid)
                {
                    $('#progress').css({'width':complexity + '%' }).removeClass('progressbarValid').addClass('progressbarInvalid');
                    $("#notice").removeClass('noticeValid').addClass('noticeInvalid');
                } else
                {
                    $('#progress').css({'width':complexity + '%' }).removeClass('progressbarInvalid').addClass('progressbarValid');
                    $("#notice").removeClass('noticeInvalid').addClass('noticeValid');
                }

                //$('#complexity').html(Math.round(complexity) );

            });


            //affiche la div progressBar quand tape clavier
            $( "input:password" ).keydown(function( event )
            {
                if ( event.which == 13 )
                {
                    event.preventDefault();
                }
                $("#progressbar").show();
                $("#notice").show();

            });

            //Message erreur au submit
            $( "#submit" ).click(function() {

                //http://www.w3schools.com/jsref/jsref_regexp_test.asp

                //stocke la valeur des champs input en variable
                var nameVal = $("#name").val();
                var firstnameVal = $("#firstname").val();
                var emailVal = $("#email").val();
                var passwordVal = $("#password").val();
                var passwordCheckVal = $("#passwordConfirmation").val();

                //notre expression regulière pour la verification de la validité du mail
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                //notre expression regulière pour la verification du mot de passe (longueur, MAJ, min, special chars)
                var passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@*#]).([a-zA-Z0-9@*#]{8,26})$/;

                var hasError = false;

                //cache le span pour eviter la repetition lors du submit
                $(".error").hide();

                //Si champ name est vide
                if (nameVal == '') 
                {   

                    //insere notre message d'erreur apres la div du name
                    $("#name").after('<span class="error">Please enter a name.</span>');
                    /*$('#name').popover({ title: 'Error', content:'Please enter a name' , html:true });
                    $('#name').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }

                //Sinon si name est < 2
                else if ( nameVal.length < 2 )
                    {

                    //insere notre message d'erreur apres la div du name
                    $("#name").after('<span class="error">Must be more than 2 characters.</span>');
                        /*$('#name').popover({ title: 'Error', content:'Must be more than 2 characters' , html:true });
                        $('#name').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }

                //Sinon si name est > 15
                else if ( nameVal.length > 15 )
                {

                    //insere notre message d'erreur apres la div du name
                    $("#name").after('<span class="error">Your name is too long.</span>');

                    /*$('#name').popover({ title: 'Error', content:'Your name is too long' , html:true });
                    $('#name').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }

                //Sinon si firstname est vide
                if (firstnameVal == '')
                {

                    //insere notre message d'erreur apres la div du firstname
                    $("#firstname").after('<span class="error">Please enter a first name.</span>');
                    /*$('#firstname').popover({ title: 'Error', content:'Please enter a first name' , html:true });
                    $('#firstname').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }

                //Sinon si firstname est < 2
                else if (firstnameVal.length < 2)
                {

                    //insere notre message d'erreur apres la div du firstname
                    $("#firstname").after('<span class="error">Must be more than 2 characters.</span>');
                    /*$('#firstname').popover({ title: 'Error', placement:'left', content:'Must be more than 2 characters' , html:true });
                    $('#firstname').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //Sinon si firstname est > 15
                else if (firstnameVal.length > 15)
                {

                    //insere notre message d'erreur apres la div du firstname
                    $("#firstname").after('<span class="error">Your first name is too long.</span>');
                    /*$('#firstname').popover({ title: 'Error', placement:'left', content:'Your first name is too long' , html:true });
                    $('#firstname').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }

                //Sinon si email est vide
                if (emailVal == '')
                {
                    //insere notre message d'erreur apres la div du email
                    $("#email").after('<span class="error">Please enter an email.</span>');
                    /*$('#email').popover({ title: 'Error', content:'Please enter an email' , html:true });
                    $('#email').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //verifie la longueur de l'email, email doit etre < 26 sinon erreur
                else if (emailVal.length > 26)
                {
                    //insere notre message d'erreur apres la div du email
                    $("#email").after('<span class="error">Your email is too long.</span>');
                    /*$('#email').popover({ title: 'Error', content:'Your email is too long' , html:true });
                    $('#email').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //Test de la validité du mail
                else if(!emailReg.test(emailVal))
                {
                    //insere notre message d'erreur apres la div du email
                    $("#email").after("<span class='error'>Your email is not valid.</span>");
                    /*$('#email').popover({ title: 'Error', content:'Your email is not valid' , html:true });
                    $('#email').popover('show');*/
                    hasError = true;
                }

               //Sinon si password est vide
                if (passwordVal == '' )
                {  
                    //insere notre message d'erreur apres la div du password pour la non correspondance
                    $("#password").after('<span class="error">Please enter a password.</span>');
                    /*$('#password').popover({ title: 'Error', content:'Please enter a password' , html:true });
                    $('#password').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //Verifie que le mot de passe ne soit pas égal au nom
                else if (passwordVal == nameVal )
                { 
                    //insere notre message d'erreur apres la div du password pour la non correspondance
                    $("#password").after('<span class="error">You can\'t have your name as your password.</span>');
                    /*$('#password').popover({ title: 'Error', content:'You can\'t have your name as your password' , html:true, placement:'left' });
                    $('#password').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                 //Verifie que le mot de passe ne soit pas égal au prénom
                else if (passwordVal == firstnameVal )
                { 
                    //insere notre message d'erreur apres la div du password pour la non correspondance
                    $("#password").after('<span class="error">You can\'t have your first name as your password.</span>');
                    /*$('#password').popover({ title: 'Error', content:'You can\'t have your first name as your password' , html:true, placement:'left' });
                    $('#password').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //verifie que le mot de passe ne soit pas égal à l'email
                else if (passwordVal == emailVal )
                { 
                    //insere notre message d'erreur apres la div du password pour la non correspondance
                    $("#password").after('<span class="error">You can\'t have your email as your password.</span>');
                    /*$('#password').popover({ title: 'Error', content:'You can\'t have your email as your password' , html:true, placement:'left' });
                    $('#password').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //verifie que le mot de passe respecte nos conditions (MAJ,min,special char, compris entre 8 et 26 char)
                //is a standard javascript function for checking strings against regular expressions
                else if (!passwordReg.test(passwordVal))
                {
                    //insere notre message d'erreur apres la div du password pour la non correspondance
                    $("#password").after('<span class="error">Must contain at least: one upper case, one lower case, <br />One special character(@*#)<br /> And be between 8-26 characters.</span>');
                    /*$('#password').popover({ title: 'Error', content:'Must contain at least: one upper case, one lower case, one special character(@*#), and be between 8-26 characters' , html:true, placement:'left' });
                    $('#password').popover('show');*/
                    //erreur = 1
                    hasError = true;
                }
                //Enfin nous verifierons la correspondance des mdp
                else if (passwordVal != passwordCheckVal )
                {
                    //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
                    $("#passwordConfirmation").after('<span class="error">Passwords do not match.</span>');
                    /*$('#passwordConfirmation').popover({ title: 'Error', content:'Passwords do not match' , html:true });
                    $('#passwordConfirmation').popover('show');*/
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