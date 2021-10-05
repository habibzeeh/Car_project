<?php include 'Header.php';

$user = $user = $_SESSION["user"];


$id = $_GET["id"];
$car = $m->cr->get($id);

$price = "";
$currency = "";
$rate = "";
$deposit = "";
$receipt = "";
$purchaser = "";
$phone = "";
$date = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST["price"];
    $currency = $_POST["currency"];
    $rate = $_POST["rate"];
    $deposit = $_POST["deposit"];
    $receipt = $_POST["receipt"];
    $purchaser = $_POST["purchaser"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];

    if(strlen($price) == "")
        $err = "Price Required \n" ;
    else{
        $sold =  Sold::setData($id,$user->id,$car->id,$purchaser,$phone,$price,$currency,$rate,$deposit,$receipt,$date);
        $result = $m->sm->add($sold);
        header('Location: solds.php');
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
                        <?php if(isset($err)):?>
                            <div class="alert alert-dark-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?=$err?>
                            </div>
                        <?php endif; ?>

                        <div class="card mb-4">
                            <h6 class="card-header">Edit</h6>
                            <div class="card-body">
                                <form action="sold_add.php?id=<?=$id;?>" method="post">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input name="car_name" type="text" class="form-control" placeholder="Name" value="<?=$car->name;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Model</label>
                                        <input name="car_model" type="text" class="form-control" placeholder="Car Model" value="<?=$car->model;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Price</label>
                                        <input name="price" type="number" class="form-control" placeholder="Price" value="<?=$price;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Currency</label>
                                        <input name="currency" type="text" class="form-control" placeholder="Currency" value="<?=$currency;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Rate</label>
                                        <input name="rate" type="number" class="form-control" placeholder="Rate" value="<?=$rate;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Deposit</label>
                                        <input name="deposit" type="number" class="form-control" placeholder="Deposit" value="<?=$deposit;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Receipt</label>
                                        <input name="receipt" type="text" class="form-control" placeholder="Receipt" value="<?=$receipt;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Purchaser Name</label>
                                        <input name="purchaser" type="text" class="form-control" placeholder="Purchaser Name" value="<?=$purchaser;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Purchaser Phone</label>
                                        <input name="phone" type="text" class="form-control" placeholder="Purchaser Phone" value="<?=$phone;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sold Date</label>
                                        <input name="date" type="date" class="form-control" placeholder="Sold Date" value="<?=$date;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right btn-primary">
                                        <span class="far fa-edit"></span>&nbsp;&nbsp;Update</button>
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