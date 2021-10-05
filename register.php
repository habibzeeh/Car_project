<?php

require 'Manager.php';
$m = Manager::getInstance();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $m->lm->register($_POST["name"],$_POST["email"],$_POST["password"]);
}

?>


<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Us Car Management</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Us Car Management Portal"/>
    <meta name="keywords" content="Car, Management, Us, Copart, Import, Manage Cars, Containers, Show Rooms">
    <meta name="author" content="Halima Habib" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.css">
    <link rel="stylesheet" href="assets/fonts/linearicons.css">
    <link rel="stylesheet" href="assets/fonts/open-iconic.css">
    <link rel="stylesheet" href="assets/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="assets/css/shreerang-material.css">
    <link rel="stylesheet" href="assets/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="assets/css/pages/authentication.css">
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <!-- [ Logo ] Start -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="ui-w-60">
                    <div class="w-100 position-relative">
                        <img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->

            <?php if(isset($result)):
                $alertClass = $result["success"]? "alert-dark-success" : "alert-dark-danger";
                ?>
                <br>
                <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $result["msg"]; ?>
                </div>

            <?php endif; ?>


            <!-- [ Form ] Start -->
            <form class="my-5" action="" method="post" >
                <div class="form-group">
                    <label class="form-label">Your name</label>
                    <input name="name" type="text" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Your email</label>
                    <input name="email" type="text" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <button  type="submit" value="Submit" class="btn btn-primary btn-block mt-4">Sign Up</button>
                <div class="bg-lightest text-muted small p-2 mt-4">
                    By clicking "Sign Up", you agree to our
                    <a href="javascript:void(0)">terms of service and privacy policy</a>. We’ll occasionally send you account related emails.
                </div>
            </form>
            <!-- [ Form ] End -->

            <div class="text-center text-muted">
                Already have an account?
                <a href="login.php">Sign In</a>
            </div>

        </div>
    </div>
    <!-- [ content ] End -->

    <?php include 'libs.php';?>
</body>

</html>
