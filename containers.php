<?php include 'Header.php'; include 'Header_files.php';

$user = $user = $_SESSION["user"];
$containers = $m->cm->getAll($user->id);

function containerCarCount($id,$m){
    $cars = $m->cr->getAllContainer($id);
    return count($cars);
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

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Containers</h4>

                            <div class="w-50 float-right">
                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='container_add.php';">
                                    <span class="far fa-plus-square"></span>&nbsp;&nbsp;Add Container</button>
                            </div>

                        </div>

                        <div class="card" style="overflow-x:auto;">

                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Cars</th>
                                    <th>Booked Date</th>
                                    <th>Ship Date</th>
                                    <th>Receive Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($containers as $container):  ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $container->name; ?></td>
                                    <td><?= $container->number; ?></td>
                                    <td><?= containerCarCount($container->id,$m); ?></td>
                                    <td><?= $container->booked_date; ?></td>
                                    <td><?= $container->ship_date; ?></td>
                                    <td><?= $container->receive_date; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="window.location.href='container.php?id=<?=$container->id;?>';">
                                            <span class="far fa-paper-plane"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-success" onclick="window.location.href='container_edit.php?id=<?=$container->id;?>';">
                                            <span class="far fa-edit"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="window.location.href='container_delete.php?id=<?=$container->id;?>';">
                                            <span class="far fa-trash-alt"></span>
                                        </button>
                                    </td>
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