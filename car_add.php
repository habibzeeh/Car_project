<?php include 'Header.php'; include 'Header_files.php';

$user = $user = $_SESSION["user"];
$show_rooms = $m->sr->getAll($user->id);
$containers = $m->cm->getAll($user->id);
$car = Car::setData("","","","","","","","","","","","","","","","","");

$cid = $car->container_id;
$sid = $car->showroom_id;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST["user_id"] = $user->id;
    $_POST["id"] = "";
    if(!isset($_POST["container_id"])) $_POST["container_id"] = "";
    if(!isset($_POST["showroom_id"])) $_POST["showroom_id"] = "";

    $sid =  $_POST["showroom_id"];
    $cid = $_POST["container_id"];
    $car =  Car::setArray($_POST);
    if(strlen($_POST["name"]) == 0)
        $err = "Name Required \n" ;
    else{
        //print_r($car);
        //exit;
        $result = $m->cr->add($car);
        header('Location: cars.php');
    }
}
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

                            <h4 class="font-weight-bold py-3 mb-0 w-50">Add Car</h4>



                        </div>

                        <div class="container-fluid flex-grow-1 container-p-y">
                            <?php if(isset($err)):?>
                                <div class="alert alert-dark-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?=$err?>
                                </div>
                            <?php endif; ?>


                            <div class=" card card-body">
                            <form action="car_add.php" method="post">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?=$car->name;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Model</label>
                                    <input name="model" type="text" class="form-control" placeholder="Model" value="<?=$car->model;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Chasis No</label>
                                    <input name="chasis_no" type="text" class="form-control" placeholder="Chasis No" value="<?=$car->chasis_no;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Make</label>
                                    <input name="make" type="text" class="form-control" placeholder="Make" value="<?=$car->make;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Buy($)</label>
                                    <input name="buy" type="number" class="form-control" placeholder="Buy($)" value="<?=$car->buy;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Tow($)</label>
                                    <input name="tow" type="number" class="form-control" placeholder="Tow($)" value="<?=$car->tow;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Shipping($)</label>
                                    <input name="shipping" type="number" class="form-control" placeholder="Shipping($)" value="<?=$car->shipping;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Storage</label>
                                    <input name="storage" type="number" class="form-control" placeholder="Storage" value="<?=$car->storage;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Custom($)</label>
                                    <input name="custom" type="number" class="form-control" placeholder="Custom($)" value="<?=$car->custom;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Clearance($)</label>
                                    <input name="clearance" type="number" class="form-control" placeholder="Clearance($)" value="<?=$car->clearance;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Vat Tax($)</label>
                                    <input name="vat_tax" type="number" class="form-control" placeholder="Vat Tax($)" value="<?=$car->vat_tax;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Commission($)</label>
                                    <input name="commission" type="number" class="form-control" placeholder="Commission($)" value="<?=$car->commission;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Purchase Date</label>
                                    <input name="purchase_date" type="date" class="form-control" placeholder="Purchase Date" value="<?=$car->purchase_date;?>" >
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Container</label>
                                    <select class="custom-select" name="container_id">
                                        <option value="" selected disabled hidden>Select Container</option>
                                        <option value="">None</option>
                                        <?php foreach ($containers as $container):?>
                                        <option value="<?=$container->id;?>"><?=$container->name . " (" . $container->number. ")"; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Show Room</label>
                                    <select class="custom-select" name="showroom_id">
                                        <option value="" selected disabled hidden>Select Show Room</option>
                                        <option value="">None</option>
                                        <?php foreach ($show_rooms as $show_room):?>
                                            <option value="<?=$show_room->id;?>" <?php if($show_room->id==$sid)echo"selected";?>><?=$show_room->name . " (" . $show_room->location. ")"; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary float-right btn-primary">
                                    <span class="far fa-plus-square"></span>&nbsp;&nbsp;Add Car</button>
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