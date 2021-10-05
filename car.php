<?php include 'Header.php';

$user = $user = $_SESSION["user"];
$id = $_GET["id"];
$car = $m->cr->get($id);
$sold = $m->sm->get($id);

$status = $car->status();
if(isset($sold->id))
    $status = "Sold";

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

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Car Details</h4>

                            <div class="w-50">

                                <button  type="button" class="btn btn-lg float-right btn-outline-danger"  onclick="window.location.href='car_delete.php?id=<?=$id;?>';">
                                    <span class="far fa-trash-alt"></span>&nbsp;&nbsp;Delete</button>

                                <div class="float-right">&nbsp;</div>

                                <button  type="button" class="btn btn-lg float-right btn-outline-success"  onclick="window.location.href='car_edit.php?id=<?=$id;?>';">
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
                                                    <h6 class="text-primary text-large">Total Cost($)</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$car->totalPrice();?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex col-md-6 col-lg-4 align-items-center">
                                        <div class="card-body">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <i class="lnr lnr-construction text-primary display-1"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-primary text-large">Status</span></h6>
                                                    <h4 class="mt-3 mb-0"><?=$status;?></h4>
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
                                                    <h4 class="mt-3 mb-0"><?="1";?></h4>
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
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?=$car->name;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Model</label>
                                    <input name="model" type="text" class="form-control" placeholder="Model" value="<?=$car->model;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Chasis No</label>
                                    <input name="chasis_no" type="text" class="form-control" placeholder="Chasis No" value="<?=$car->chasis_no;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Make</label>
                                    <input name="make" type="text" class="form-control" placeholder="Make" value="<?=$car->make;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Buy($)</label>
                                    <input name="buy" type="text" class="form-control" placeholder="Buy($)" value="<?=$car->buy;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Tow($)</label>
                                    <input name="tow" type="text" class="form-control" placeholder="Tow($)" value="<?=$car->tow;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Shipping($)</label>
                                    <input name="shipping" type="text" class="form-control" placeholder="Shipping($)" value="<?=$car->shipping;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Storage</label>
                                    <input name="storage" type="number" class="form-control" placeholder="Storage" value="<?=$car->storage;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Custom($)</label>
                                    <input name="custom" type="text" class="form-control" placeholder="Custom($)" value="<?=$car->custom;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Clearance($)</label>
                                    <input name="clearance" type="text" class="form-control" placeholder="Clearance($)" value="<?=$car->clearance;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Vat Tax($)</label>
                                    <input name="vat_tax" type="text" class="form-control" placeholder="Vat Tax($)" value="<?=$car->vat_tax;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Commission($)</label>
                                    <input name="commission" type="text" class="form-control" placeholder="Commission($)" value="<?=$car->commission;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Purchase Date</label>
                                    <input name="purchase_date" type="text" class="form-control" placeholder="Purchase Date" value="<?=$car->purchase_date;?>" readonly>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
                            <?php if(!isset($sold->id)):?>
                            <div class="float-right">
                                <button onclick="window.location.href='sold_add.php?id=<?=$car->id;?>';" class="btn btn-primary float-right btn-primary">
                                    <span class="far fa-paper-plane"></span>&nbsp;&nbsp;Sold Car</button>
                            </div>
                            <?php endif; ?>
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