<?php include 'Header.php';

$user = $user = $_SESSION["user"];


$id = $_GET["id"];
$container = $m->cm->get($id);

$name = $container->name;
$number = $container->number;
$booked_date = $container->booked_date;
$ship_date = $container->ship_date;
$receive_date = $container->receive_date;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $booked_date = $_POST["booked_date"];
    $ship_date = $_POST["ship_date"];
    $receive_date = $_POST["receive_date"];


    if(strlen($number) == "")
        $err = "Number Required \n" ;
    else{

        if(strlen($name) == 0) $name = "Container";
        $container =  Container::setData($id,$user->id,$name,$number,$booked_date,$ship_date,$receive_date);
        $result = $m->cm->update($container);
        header('Location: containers.php');
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
                            <h6 class="card-header">Edit Container</h6>
                            <div class="card-body">
                                <form action="container_edit.php?id=<?=$id;?>" method="post">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name" value="<?=$name;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Number</label>
                                        <input name="number" type="text" class="form-control" placeholder="Number" value="<?=$number;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Booked Date</label>
                                        <input name="booked_date" type="date" class="form-control" placeholder="Booked Date" value="<?=$booked_date;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ship Date</label>
                                        <input name="ship_date" type="date" class="form-control" placeholder="Ship Date" value="<?=$ship_date;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Receive Date</label>
                                        <input name="receive_date" type="date" class="form-control" placeholder="Receive Date" value="<?=$receive_date;?>">
                                        <div class="clearfix"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right btn-primary">
                                        <span class="far fa-edit"></span>&nbsp;&nbsp;Update Show Room</button>
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