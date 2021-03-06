/**
 * Created by Ken on 12/03/14.
 */
$(function () {

    //Cache le progress bar
    $("#progressbarRegister").hide();
    //Cache la notice
    $("#notice").hide();

    //traitement de la complexité du mdp
    $("#password").complexify({}, function (valid, complexity)
    {

        if (!valid)
        {
            $('#progressRegister').css({'width':complexity + '%' }).removeClass('progressbarValid').addClass('progressbarInvalid');
            $("#notice").removeClass('noticeValid').addClass('noticeInvalid');
        }
        else
        {
            $('#progressRegister').css({'width':complexity + '%' }).removeClass('progressbarInvalid').addClass('progressbarValid');
            $("#notice").removeClass('noticeInvalid').addClass('noticeValid');
        }

        //$('#passwordComplexity').html(Math.round(passwordComplexity) );

    });

    //affiche la div progressBar quand tape clavier
    $( "input:password" ).keydown(function( event )
    {
        if ( event.which == 13 )
        {
            event.preventDefault();
        }
        $("#progressbarRegister").show();
        $("#notice").show();

    });

    //Message erreur au submit
    $( "#submit" ).click(function()
    {

        //stocke la valeur des champs input en variable
        var nameVal = $("#name").val();
        var firstnameVal = $("#firstname").val();
        var emailVal = $("#email").val();
        var passwordVal = $("#password").val();
        var passwordCheckVal = $("#passwordConfirmation").val();
        var captcha = $("#captcha").val();

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
            //erreur = 1
            hasError = true;
        }

        //Sinon si name est < 2
        else if ( nameVal.length < 2 )
        {
            //insere notre message d'erreur apres la div du name
            $("#name").after('<span class="error">Must be more than 2 characters.</span>');
            //erreur = 1
            hasError = true;
        }

        //Sinon si name est > 15
        else if ( nameVal.length > 15 )
        {
            //insere notre message d'erreur apres la div du name
            $("#name").after('<span class="error">Too long, 15 characters maximum.</span>');
            //erreur = 1
            hasError = true;
        }

        //Sinon si firstname est vide
        if (firstnameVal == '')
        {

            //insere notre message d'erreur apres la div du firstname
            $("#firstname").after('<span class="error">Please enter a first name.</span>');
            //erreur = 1
            hasError = true;
        }

        //Sinon si firstname est < 2
        else if (firstnameVal.length < 2)
        {

            //insere notre message d'erreur apres la div du firstname
            $("#firstname").after('<span class="error">Must be more than 2 characters.</span>');
            //erreur = 1
            hasError = true;
        }
        //Sinon si firstname est > 15
        else if (firstnameVal.length > 15)
        {
            //insere notre message d'erreur apres la div du firstname
            $("#firstname").after('<span class="error">Too long, 15 characters maximum.</span>');
            //erreur = 1
            hasError = true;
        }

        //Sinon si email est vide
        if (emailVal == '')
        {
            //insere notre message d'erreur apres la div du email
            $("#email").after('<span class="error">Please enter an email.</span>');
            //erreur = 1
            hasError = true;
        }
        //verifie la longueur de l'email, email doit etre < 26 sinon erreur
        else if (emailVal.length > 26)
        {
            //insere notre message d'erreur apres la div du email
            $("#email").after('<span class="error">Too long, 26 characters maximum.</span>');
            //erreur = 1
            hasError = true;
        }
        //Test de la validité du mail
        else if(!emailReg.test(emailVal))
        {
            //insere notre message d'erreur apres la div du email
            $("#email").after("<span class='error'>Your email is not valid.</span>");
            hasError = true;
        }

        //Sinon si password est vide
        if (passwordVal == '' )
        {
            //insere notre message d'erreur apres la div du password pour la non correspondance
            $("#password").after('<span class="error">Please enter a password.</span>');
            //erreur = 1
            hasError = true;
        }
        //Verifie que le mot de passe ne soit pas égal au nom
        else if (passwordVal == nameVal )
        {
            //insere notre message d'erreur apres la div du password pour la non correspondance
            $("#password").after('<span class="error">You can\'t have your name as your password.</span>');
            //erreur = 1
            hasError = true;
        }
        //Verifie que le mot de passe ne soit pas égal au prénom
        else if (passwordVal == firstnameVal )
        {
            //insere notre message d'erreur apres la div du password pour la non correspondance
            $("#password").after('<span class="error">You can\'t have your first name as your password.</span>');
            //erreur = 1
            hasError = true;
        }
        //verifie que le mot de passe ne soit pas égal à l'email
        else if (passwordVal == emailVal )
        {
            //insere notre message d'erreur apres la div du password pour la non correspondance
            $("#password").after('<span class="error">You can\'t have your email as your password.</span>');
            //erreur = 1
            hasError = true;
        }
        //verifie que le mot de passe respecte nos conditions (MAJ,min,special char, compris entre 8 et 26 char)
        //is a standard javascript function for checking strings against regular expressions
        else if (!passwordReg.test(passwordVal))
        {
            //insere notre message d'erreur apres la div du password pour la non correspondance
            $("#password").after('<span class="error">Must contain at least: one upper case, one lower case, <br />One special character(@*#)<br /> And be between 8-26 characters.</span>');
            hasError = true;
        }
        //Enfin nous verifierons la correspondance des mdp
        else if (passwordVal != passwordCheckVal )
        {
            //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
            $("#passwordConfirmation").after('<span class="error">Passwords do not match.</span>');
            hasError = true;
        }
        //Enfin nous verifierons la correspondance des mdp
        else if (captcha == '' )
        {
            //insere notre message d'erreur apres la div du passwordConfirmation pour la non correspondance
            $("#captcha").after('<span class="error">Please fill in the captcha.</span>');
            //erreur = 1
            hasError = true;
        }

        //sécurité du submit! Si erreur on valide pas
        if(hasError == true) { return false; }

    });



});