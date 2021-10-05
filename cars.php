<?php include 'Header.php';

$user = $user = $_SESSION["user"];
$cars = $m->cr->getAll($user->id);

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
                            <h4 class="font-weight-bold py-3 mb-0 w-50">Cars</h4>
                            <div class="w-50 float-right">
                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='car_add.php';">
                                    <span class="far fa-plus-square"></span>&nbsp;&nbsp;Add Car</button>
                            </div>
                        </div>

                        <div class="card" style="overflow-x:auto;">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>Chasis No</th>
                                    <th>Buy($)</th>
                                    <th>Tow($)</th>
                                    <th>Shipping($)</th>
                                    <th>Storage</th>
                                    <th>Custom($)</th>
                                    <th>Clearance($)</th>
                                    <th>Vat Tax($)</th>
                                    <th>Commission($)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($cars as $car):  ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $car->name; ?></td>
                                    <td><?= $car->model; ?></td>
                                    <td><?= $car->chasis_no; ?></td>
                                    <td><?= $car->buy; ?></td>
                                    <td><?= $car->tow; ?></td>
                                    <td><?= $car->shipping; ?></td>
                                    <td><?= $car->storage; ?></td>
                                    <td><?= $car->custom; ?></td>
                                    <td><?= $car->clearance; ?></td>
                                    <td><?= $car->vat_tax; ?></td>
                                    <td><?= $car->commission; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="window.location.href='car.php?id=<?=$car->id;?>';">
                                            <span class="far fa-paper-plane"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-success" onclick="window.location.href='car_edit.php?id=<?=$car->id;?>';">
                                            <span class="far fa-edit"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="window.location.href='car_delete.php?id=<?=$car->id;?>';">
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