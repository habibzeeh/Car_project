<?php include 'Header.php';

$user = $user = $_SESSION["user"];
$id = $_GET["id"];
$container = $m->cm->get($id);
$cars = $m->cr->getAllContainer($id);

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

                            <h4 class="font-weight-bold py-3 mb-0 w-50"><?=$container->name;?><span class="text-tiny text-primary"> (<?=$container->number;?>)</span></h4>

                            <div class="w-50">

                                <button  type="button" class="btn btn-lg float-right btn-outline-danger"  onclick="window.location.href='container_delete.php?id=<?=$id;?>';">
                                    <span class="far fa-trash-alt"></span>&nbsp;&nbsp;Delete</button>

                                <div class="float-right">&nbsp;</div>

                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='container_edit.php?id=<?=$id;?>';">
                                    <span class="far fa-edit"></span>&nbsp;&nbsp;Edit</button>

                            </div>
                        </div>


                        <div>
                            <div class="card d-flex w-100 mb-4">
                                <div class="row no-gutters row-bordered row-border-light h-100">

                                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-car text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Total Cars</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=sizeof($cars);?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-calendar-full text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Booked Date</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$container->booked_date;?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-calendar-full text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Ship Date</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$container->ship_date;?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex col-md-6 col-lg-3 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-calendar-full text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Receive Date</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$container->receive_date;?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Staustic card 3 Start -->
                        </div>

                        <div class="card" style="overflow-x:auto;">>
                            <div class="card-header"><h4>Cars</h4></div>
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>model</th>
                                    <th>Chasis No</th>
                                    <th>Purchase Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; foreach($cars as $car):  ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $car->name; ?></td>
                                    <td><?= $car->model;?></td>
                                    <td><?= $car->chasis_no; ?></td>
                                    <td><?= $car->purchase_date; ?></td>
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