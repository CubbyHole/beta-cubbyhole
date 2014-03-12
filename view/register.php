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

</body>
</html>