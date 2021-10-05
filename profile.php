<?php
include 'Header.php';
$user = $_SESSION["user"];
$m = Manager::getInstance();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $m->um->updateName($user,$_POST["name"]);
    $m->lm->refreshUser($user);
    $user = $_SESSION["user"];
}

?>

<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Login Page</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Bhumlu Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="Bhumlu, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="Srthemesvilla" />
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
<br>
<div class="col-sm-12">
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="card-header-title mb-0">Profile Details</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">

                <?php if(isset($result)):
                    $alertClass = $result["success"]? "alert-dark-success" : "alert-dark-danger";
                    ?>
                    <br>
                    <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $result["msg"]; ?>
                    </div>

                <?php endif; ?>


                <img src="<?php echo $m->um->getUserPictureLink($user); ?>" alt="" class="d-block ui-w-100 rounded-circle">
                <div class="form-group">
                    <label class="form-label w-100">Profile Picture</label>
                    <input type="file" name="picture">
                    <small class="form-text text-muted">Select a picture to update.</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $user->name; ?>">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $user->email; ?>" readonly>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">User Type</label>
                    <input type="text" class="form-control" value="<?php echo strtoupper($user->type); ?>" readonly>
                    <div class="clearfix"></div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>


        </div>
    </div>
</div>

<?php include 'libs.php';?>

</body>

</html>
