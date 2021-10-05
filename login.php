<?php
require 'Manager.php';
$m = Manager::getInstance();
if(isset($_SESSION["isLogin"]))
    header("Location: index.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $m->lm->login($_POST["email"],$_POST["password"]);
    if($result["success"]) header( "refresh:2;url=index.php" );

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
                    <label class="form-label">Email</label>
                    <input name="email" type="text" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label d-flex justify-content-between align-items-end">
                        <span>Password</span>
                        <a href="reset-password.php" class="d-block small">Forgot password?</a>
                    </label>
                    <input name="password" type="password" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center m-0">
                    <label class="custom-control custom-checkbox m-0">
                        <input name="remember" type="checkbox" class="custom-control-input">
                        <span class="custom-control-label">Remember me</span>
                    </label>
                    <button type="submit" value="Submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
            <!-- [ Form ] End -->

            <div class="text-center text-muted">
                Don't have an account yet?
                <a href="register.php">Sign Up</a>
            </div>

        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="assets/js/pace.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/libs/popper/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/sidenav.js"></script>
    <script src="assets/js/layout-helpers.js"></script>
    <script src="assets/js/material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

</body>

</html>
