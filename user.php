<?php include 'Header.php';

$user = $_SESSION["user"];
$id = $_GET["id"];
$us = $m->um->getUserById($id);

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
            <?php include 'side_nav_bar_user.php'; ?>
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

                            <h4 class="font-weight-bold py-3 mb-0 w-50">User Details</h4>

                            <div class="w-50">

                                <button  type="button" class="btn btn-lg float-right btn-outline-danger" <?= $us->isAdmin()?"disabled":""; ?>  onclick="window.location.href='car_delete.php?id=<?=$id;?>';">
                                    <span class="far fa-trash-alt"></span>&nbsp;&nbsp;Delete</button>

                                <div class="float-right">&nbsp;</div>

                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='car_edit.php?id=<?=$id;?>';">
                                    <span class="far fa-edit"></span>&nbsp;&nbsp;Edit</button>

                            </div>

                        </div>




                        <div class=" card card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?=$us->name;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Email" value="<?=$us->email;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Type</label>
                                    <input name="type" type="text" class="form-control" placeholder="Type" value="<?=ucfirst($us->type);?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <input name="status" type="text" class="form-control" placeholder="Status" value="<?= ($us->status==1)?"Active":"Not Active"?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
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