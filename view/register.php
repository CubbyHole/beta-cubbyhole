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
                        <div id="progressbar">
                            <div id="progress" class="progressbarInvalid" style="width: 0%;">
                                <div id="complexity">0</div>
                            </div>
                        </div>

                        <input id="geolocation" name="geolocation" type="hidden">

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
<?php
include '../footer/register.footer.php';
?>
    <script type="text/javascript">

        /**
         * Fonction de callback dans laquelle on traite les coordonnées de l'utilisateur
         * @author Alban Truc
         * @param position Position de l'utilisateur
         * @since 20/01/2014
         * Dernière update: 11/03/2014
         */
        function currentHumanReadablePosition(position)
        {
            //Coordonnées actuelles de l'utilisateur
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            //Création des objets nécessaires pour utiliser l'API
            var geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(latitude, longitude);

            /*
             Processus de Reverse Geocoding: transformer des coordonnées (longitude et latitude)
             en adresse lisible par l'humain.
             */
            geocoder.geocode({'latLng': latlng}, function(results, status)
            {
                if(status == google.maps.GeocoderStatus.OK)
                {
                    /*
                     Plusieurs résultats sont fournis, le second (results[1]) fournit une adresse formatée
                     en général suffisamment précise sans pour autant l'être trop.
                     */
                    if(results[1])
                        $('#geolocation').val(results[1].formatted_address);
                }
                else
                //Probablement à retirer, l'utilisateur n'a de toutes façon pas à avoir ces données
                    $('#geolocation').val('Geocoder failed due to: ' + status);
            });
        }

        /**
         * Récupère la localisation de l'utilisateur par son navigateur.
         * Nécessite son approbation.
         * @author Alban Truc
         * @since 20/01/2014
         */
        if(navigator.geolocation)
            navigator.geolocation.getCurrentPosition(currentHumanReadablePosition);

        $(function () {

            //Cache le progress bar
            $("#progressbar").hide();

            //traitement de la complexité du mdp
            $("#password").complexify({}, function (valid, complexity) {
                
                if (!valid) {
                    $('#progress').css({'width':complexity }).removeClass('progressbarValid').addClass('progressbarInvalid');
                } else {
                    $('#progress').css({'width':complexity }).removeClass('progressbarInvalid').addClass('progressbarValid');
                }

                $('#complexity').html(Math.round(complexity) );

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