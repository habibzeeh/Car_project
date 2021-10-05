<?php include 'Header.php';

$user = $user = $_SESSION["user"];
$id = $_GET["id"];
$sold = $m->sm->get($id);
$car = $m->cr->get($sold->car_id);

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

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Sold Details</h4>

                            <div class="w-50">

                                <button  type="button" class="btn btn-lg float-right btn-outline-danger"  onclick="window.location.href='sold_delete.php?id=<?=$id;?>';">
                                    <span class="far fa-trash-alt"></span>&nbsp;&nbsp;Delete</button>

                                <div class="float-right">&nbsp;</div>

                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='sold_edit.php?id=<?=$id;?>';">
                                    <span class="far fa-edit"></span>&nbsp;&nbsp;Edit</button>

                            </div>

                        </div>


                        <div>
                            <div class="card d-flex w-100 mb-4">
                                <div class="row no-gutters row-bordered row-border-light h-100">

                                    <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-diamond text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Purchase($)</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$car->totalPrice();?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-diamond text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Sold($)</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$sold->price;?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-rocket text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Profit</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$sold->price-$car->totalPrice();?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Staustic card 3 Start -->
                        </div>


                        <div class=" card card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?=$car->name;?> " readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Model</label>
                                    <input name="model" type="text" class="form-control" placeholder="Model" value="<?=$car->model;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Purchaser Name</label>
                                    <input name="chasis_no" type="text" class="form-control" placeholder="Chasis No" value="<?=$sold->purchaser_name;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Purchaser Phone</label>
                                    <input name="buy" type="text" class="form-control" placeholder="Buy($)" value="<?=$sold->purchaser_phone;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Sold Price</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$sold->price;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sold Currency</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$sold->currency;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rate</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$sold->rate;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sold Price($)</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$sold->rate * $sold->price;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Deposit</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$sold->deposit;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Receipt</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$sold->receipt;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Date</label>
                                    <input name="shipping" type="text" class="form-control" placeholder="Shipping($)" value="<?=$sold->date;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>



                            </form>
                            <div class="float-right">
                            <button onclick="window.location.href='car.php?id=<?=$car->id;?>';" class="btn btn-primary float-right btn-primary">
                                <span class="far fa-paper-plane"></span>&nbsp;&nbsp;Open Car Details</button>
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