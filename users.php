<?php include 'Header.php';

$user = $_SESSION["user"];
$users = $m->um->getAllUsers();
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

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Users</h4>

                            <!--<div class="w-50 float-right">
                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='sold_add.php';">
                                    <span class="far fa-plus-square"></span>&nbsp;&nbsp;Add Sold</button>
                            </div>-->

                        </div>

                        <div class="card" style="overflow-x:auto;">

                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($users as $us):  ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $us->name ?></td>
                                    <td><?= $us->email; ?></td>
                                    <td><?= ucfirst($us->type); ?></td>
                                    <td><?= ($us->status==1)?"Active":"Not Active"?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="window.location.href='user.php?id=<?=$us->id;?>';">
                                            <span class="far fa-paper-plane"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-success" onclick="window.location.href='user_edit.php?id=<?=$us->id;?>';">
                                            <span class="far fa-edit"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" <?php if($us->type=='admin')echo'disabled';?> onclick="window.location.href='sold_delete.php?id=<?=$sold->id;?>';">
                                            <span class="far fa-trash-alt"></span>
                                        </button>
                                    </td>
                                </tr>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

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