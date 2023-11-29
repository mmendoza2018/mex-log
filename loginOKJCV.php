<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once "vistas/libraries/password_compatibility_libraryOKJCV.php";
}

// include the configs / constants for the database connection
require_once "vistas/dbOKJCV.php";

// load the login class
require_once "classes/LoginOKJCV.php";

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    header("location: vistas/html/principalCOT.php");
    

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="Software de Ventas">
        <meta name="author" content="Ventas">

        <link rel="shortcut icon" href="assets/images/faviconOKJCV.png">

        <title>.: VentaVax X  :.</title>

        <link href="../plugins/switchery/switchery.minOKJCV.css" rel="stylesheet" />

        <link href="assets/css/bootstrap.minOKJCV.css" rel="stylesheet" type="text/css">
        <link href="assets/css/iconsOKJCV.css" rel="stylesheet" type="text/css">
        <link href="assets/css/styleOKJCV.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.minOKJCV.js"></script>

    </head>
   <body style="	background: url(img/fondoOKJCV.png) no-repeat center top;">
   
    

 

        <div class="wrapper-page">

            <div align="center">
                <img src="img/logoOKJCV.png" class="img-responsive" alt="profile-image" width="175px" height="175px">
            </div><br>

            <form method="post" accept-charset="utf-8" action="loginOKJCV.php" name="loginform" class="form-signin">
                <?php
// show potential errors / feedback (from login object)
    if (isset($login)) {
        if ($login->errors) {
            ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Error!</strong>

                            <?php
foreach ($login->errors as $error) {
                echo $error;
            }
            ?>
                        </div>
                        <?php
}
        if ($login->messages) {
            ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Aviso!</strong>
                            <?php
foreach ($login->messages as $message) {
                echo $message;
            }
            ?>
                        </div>
                        <?php
}
    }
    ?>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                            <input class="form-control" type="text" name="usuario_users" required="" placeholder="Usuario" autocomplete="off" autofocus="">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-radar"></i></span>
                            <input class="form-control" type="password" name="con_users" required="" placeholder="Clave" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group text-right m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" id="submit"><i class='fa fa-unlock'></i> Entrar a Sistema
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <script>
            var resizefunc = [];
			
        </script>

        <!-- Plugins  -->
        <script src="assets/js/jquery.minOKJCV.js"></script>
        <script src="assets/js/tether.minOKJCV.js"></script>
        <script src="assets/js/bootstrap.minOKJCV.js"></script>
        <script src="assets/js/detectOKJCV.js"></script>
        <script src="assets/js/fastclickOKJCV.js"></script>
        <script src="assets/js/jquery.slimscrollOKJCV.js"></script>
        <script src="assets/js/jquery.blockUIOKJCV.js"></script>
        <script src="assets/js/wavesOKJCV.js"></script>
        <script src="assets/js/wow.minOKJCV.js"></script>
        <script src="assets/js/jquery.nicescrollOKJCV.js"></script>
        <script src="assets/js/jquery.scrollTo.minOKJCV.js"></script>
        <script src="../plugins/switchery/switchery.minOKJCV.js"></script>

        <!-- Custom main Js -->
        <script src="assets/js/jquery.coreOKJCV.js"></script>
        <script src="assets/js/jquery.appOKJCV.js"></script>

    </body>
	
    </html>
    <?php
}