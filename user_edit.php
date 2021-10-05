<?php include 'Header.php';

$user = $user = $_SESSION["user"];
$id = $_GET["id"];
$us = $m->um->getUserById($id);

$err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(strlen($_POST["name"]) < 3)
        $err = "Name Required \n" ;
    if(strlen($_POST["email"]) < 8)
        $err = $err . "Email Required \n" ;

    if($err == ""){
        $nus = User::setData($us->id,$_POST["email"],$_POST["name"],"","",$_POST["status"]);
            $result = $m->um->updateUser($nus);
            header('Location: users.php');
    }


}
include 'Header_files.php';
?>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <?php include 'side_nav_bar_admin.php'; ?>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->

            <?php include 'top_nav_bar_user.php';?>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <div class="row py-3 mb-0 w-100">

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Update User</h4>

                        </div>

                        <div class="container-fluid flex-grow-1 container-p-y">
                            <?php if($err != ""):?>
                                <div class="alert alert-dark-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?=$err?>
                                </div>
                            <?php endif; ?>


                            <div class=" card card-body">
                            <form action="user_edit.php?id=<?=$id;?>" method="post">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?=$us->name;?>">
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Email" value="<?=$us->email;?>">
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Type</label>
                                    <input name="type" type="text" class="form-control" placeholder="Type" value="<?=ucfirst($us->type);?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select class="custom-select" name="showroom_id">
                                        <option value="1" <?= $us->status==1?"Selected":"" ?> >Active</option>
                                        <option value="0" <?= $us->status==0?"Selected":"" ?>>Disable</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary float-right btn-primary">
                                    <span class="far fa-edit"></span>&nbsp;&nbsp;Update User</button>
                            </form>
                        </div>

                    </div>

                    </div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    <?php include 'footer.php';?>
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->


        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->


        <?php include 'libs.php';?>
</body>